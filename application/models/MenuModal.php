<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MenuModal extends CI_Model {
    public function AddMenu(){}
    public function EditMenu(){}
    public function DeleteMenu(){}
    public function ShowMenu(){}
    public function ShowPermissions($array){
        $this->db->select('me_menu.MenuID, me_menu.MenuName,me_menu.add_access as available_add_access,me_menu.edit_access as available_edit_access,me_menu.delete_access as available_delete_access,me_menu.view_access as available_view_access');
		$this->db->from('me_menu');
		$this->db->join('me_menu_access','me_menu_access.MenuID=me_menu.MenuID'); 
		$this->db->where($array);
		$query = $this->db->get();
        return $query->result_array();
    }
    public function ShowMenuBySearch($array){
        $this->db->select('me_menu.MenuID, me_menu.MenuName, me_menu.MenuLink,me_menu.MenuIcon,me_menu.MenuChild,me_menu.MenuParent');
		$this->db->from('me_menu');
		$this->db->join('me_menu_access','me_menu_access.MenuID=me_menu.MenuID'); 
		$this->db->where($array);
		$query = $this->db->get();
        return $query->result_array();
    }
    public function main_menu2($role_id){
        // Select all entries from the menu table
        //$query = $this->db->query("select id, name, link,icon,is_child,parent from " . $this->category);
        /*
        $query = 
        $query .= $this->db->where($condition);
        $query .= $this->db->get($this->category);*/
        $role_id = 1;
        $condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu_access.view_access='1'";
        $this->db->select('me_menu.MenuID, me_menu.MenuName, me_menu.MenuLink,me_menu.MenuIcon,me_menu.MenuChild,me_menu.MenuParent');
		$this->db->from('me_menu');
		$this->db->join('me_menu_access','me_menu_access.MenuID=me_menu.MenuID'); 
		$this->db->where($condition);
		$query = $this->db->get();
        // Create a multidimensional array to contain a list of items and parents
        $cat = array(
            'items' => array(),
            'parents' => array()
        );
        // Builds the array lists with data from the menu table
        foreach ($query->result() as $cats) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $cat['items'][$cats->MenuID] = $cats;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $cat['parents'][$cats->MenuParent][] = $cats->MenuID;
        }

        if ($cat) {
            $result = $this->build_main_menu2(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }
    public function main_menu($role_id) {
        // Select all entries from the menu table
        //$query = $this->db->query("select id, name, link,icon,is_child,parent from " . $this->category);
        /*
        $query = 
        $query .= $this->db->where($condition);
        $query .= $this->db->get($this->category);*/
        $role_id = 1;
        $condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu_access.view_access='1'";
        $this->db->select('me_menu.MenuID, me_menu.MenuName, me_menu.MenuLink,me_menu.MenuIcon,me_menu.MenuChild,me_menu.MenuParent');
		$this->db->from('me_menu');
		$this->db->join('me_menu_access','me_menu_access.MenuID=me_menu.MenuID'); 
		$this->db->where($condition);
		$query = $this->db->get();
        // Create a multidimensional array to contain a list of items and parents
        $cat = array(
            'items' => array(),
            'parents' => array()
        );
        // Builds the array lists with data from the menu table
        foreach ($query->result() as $cats) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $cat['items'][$cats->MenuID] = $cats;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $cat['parents'][$cats->MenuParent][] = $cats->MenuID;
        }

        if ($cat) {
            $result = $this->build_main_menu(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }

    // Menu builder function, parentId 0 is the root
    function build_main_menu($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    if($menu['items'][$itemId]->MenuParent==0){
                    $html .= '<li>';
                    $html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                    $html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                    $html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    $html .= '</a>';
                    $html .= '</li>';
                }
                else{
                    $html .= '<li>';
                    $html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                    $html .= '<span data-key="t-calendar'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    $html .= '</a>';
                    $html .= '</li>';
                }
                }
                if (isset($menu['parents'][$itemId])) {
                    $html .= '<li>';
                    $html .= '<a href="javascript: void(0);" class="has-arrow">';
                    $html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                    $html .= '<span data-key="t-apps'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    $html .= '</a>';
                    $html .= '<ul class="sub-menu" aria-expanded="false">';
                    $html .= $this->build_main_menu($itemId, $menu);
                    $html .= '</ul>';
                    $html .= '</li>';
                }
            }
        }
        return $html;
    }
    function build_main_menu2($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $count =0;
            foreach ($menu['parents'][$parent] as $itemId) {
                
                if (!isset($menu['parents'][$itemId])) {
                    
                    if($menu['items'][$itemId]->MenuParent==0){
                        $html .= '<li class="nav-item dropdown">';
                        $html .= '<a class="nav-link dropdown-toggle arrow-none" href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'" id="topnav-uielement" role="button">';
                        $html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                        $html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }
                    else{
                        $count = $count+1;
                        if($count<10){
                            $html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'" class="dropdown-item" data-key="t-alerts">'.$menu['items'][$itemId]->MenuName.'</a>';
                        }
                        
                    }
                }
                if (isset($menu['parents'][$itemId])) {
                        $html .= '<li class="nav-item dropdown">';
                        $html .= '<a class="nav-link dropdown-toggle arrow-none" href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'" id="topnav-uielement" role="button">';
                        $html .= '<span data-key="t-calendar'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                        $html .= '<div class="arrow-down"></div>';
                        $html .= '</a>';
                        if($menu['items'][$itemId]->MenuName=='Setting'){
                            $html .= '<div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl" aria-labelledby="topnav-uielement">';
                        }
                        else{
                            $html .= '<div class="dropdown-menu mega-dropdown-menu px-2" aria-labelledby="topnav-uielement">';
                        }
                        $html .= '<div class="ps-2 p-lg-0">';
                        $html .= '<div class="row">';
                        $html .= '<div class="col-lg-8">';
                        $html .= '<div>';
                        $html .= '<div class="menu-title">Components</div>';
                        $html .= '<div class="row g-0">';
                        $html .= '<div class="col-lg-5">';
                        $html .= '<div>';
                        $html .= $this->build_main_menu2($itemId, $menu);
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '<div class="col-lg-5">';
                        $html .= '<div>';
                        $html .= $this->build_main_menu3($itemId, $menu);
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</li>';
                }
            }
        }
        return $html;
    }
    function build_main_menu3($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $count =0;
            foreach ($menu['parents'][$parent] as $itemId) {
                
                if (!isset($menu['parents'][$itemId])) {
                    
                    if($menu['items'][$itemId]->MenuParent==0){
                        $html .= '<li class="nav-item dropdown">';
                        $html .= '<a class="nav-link dropdown-toggle arrow-none" href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'" id="topnav-uielement" role="button">';
                        $html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                        $html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }
                    else{
                        $count = $count+1;
                        if($count>10){
                            $html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'" class="dropdown-item" data-key="t-alerts">'.$menu['items'][$itemId]->MenuName.'</a>';
                        }
                        
                    }
                }
                if (isset($menu['parents'][$itemId])) {
                        $html .= '<li class="nav-item dropdown">';
                        $html .= '<a class="nav-link dropdown-toggle arrow-none" href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'" id="topnav-uielement" role="button">';
                        $html .= '<span data-key="t-calendar'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                        $html .= '<div class="arrow-down"></div>';
                        $html .= '</a>';
                        if($menu['items'][$itemId]->MenuName=='Setting'){
                            $html .= '<div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl" aria-labelledby="topnav-uielement">';
                        }
                        else{
                            $html .= '<div class="dropdown-menu mega-dropdown-menu px-2" aria-labelledby="topnav-uielement">';
                        }
                        $html .= '<div class="ps-2 p-lg-0">';
                        $html .= '<div class="row">';
                        $html .= '<div class="col-lg-8">';
                        $html .= '<div>';
                        $html .= '<div class="menu-title">Components</div>';
                        $html .= '<div class="row g-0">';
                        $html .= '<div class="col-lg-5">';
                        $html .= '<div>';
                        $html .= $this->build_main_menu2($itemId, $menu);
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '<div class="col-lg-5">';
                        $html .= '<div>';
                        $html .= $this->build_main_menu3($itemId, $menu);
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</li>';
                }
            }
        }
        return $html;
    }
    function build_shortcut_main_menu($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    if($menu['items'][$itemId]->MenuParent==0){
                    $html .= '<option>';
                    //$html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                    //$html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                    //$html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    //$html .= '</a>';
                    $html .= $menu['items'][$itemId]->MenuName;
                    $html .= '</option>';
                    if($menu['items'][$itemId]->add_access==1){
                        $html .= '<option>';
                        //$html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                        //$html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                        //$html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                        //$html .= '</a>';
                        $html .= $menu['items'][$itemId]->MenuName.'/Add';
                        $html .= '</option>';
                    }
                }
                else{
                    //$html .= '<li>';
                    //$html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                    //$html .= '<span data-key="t-calendar'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    //$html .= '</a>';
                    //$html .= '</li>'
                    $html .= '<option>';
                    //$html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                    //$html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                    //$html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    //$html .= '</a>';
                    $html .= $menu['items'][$itemId]->MenuName;
                    $html .= '</option>';
                    if($menu['items'][$itemId]->add_access==1){
                        $html .= '<option>';
                        //$html .= '<a href="'.base_url().''.$menu['items'][$itemId]->MenuLink.'">';
                        //$html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                        //$html .= '<span data-key="t-dashboard'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                        //$html .= '</a>';
                        $html .= $menu['items'][$itemId]->MenuName.'/Add';
                        $html .= '</option>';
                    }
                }
                }
                if (isset($menu['parents'][$itemId])) {
                    /*$html .= '<li>';
                    $html .= '<a href="javascript: void(0);" class="has-arrow">';
                    $html .= '<i data-feather="'.$menu['items'][$itemId]->MenuIcon.'" class="'.$menu['items'][$itemId]->MenuIcon.'"></i>';
                    $html .= '<span data-key="t-apps'.$itemId.'">'.$menu['items'][$itemId]->MenuName.'</span>';
                    $html .= '</a>';
                    $html .= '<ul class="sub-menu" aria-expanded="false">';
                    $html .= $this->build_main_menu($itemId, $menu);
                    $html .= '</ul>';
                    $html .= '</li>';*/
                    $html .= $this->build_shortcut_main_menu($itemId, $menu);
                }
            }
        }
        return $html;
    }
    public function shortcut_menu($role_id) {
        // Select all entries from the menu table
        //$query = $this->db->query("select id, name, link,icon,is_child,parent from " . $this->category);
        /*
        $query = 
        $query .= $this->db->where($condition);
        $query .= $this->db->get($this->category);*/
        $role_id = 1;
        $condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu_access.view_access='1'";
        $this->db->select('me_menu.MenuID, me_menu.MenuName, me_menu.MenuLink,me_menu.MenuIcon,me_menu.MenuChild,me_menu.MenuParent,me_menu_access.add_access,me_menu_access.edit_access,me_menu_access.delete_access,me_menu_access.view_access');
		$this->db->from('me_menu');
		$this->db->join('me_menu_access','me_menu_access.MenuID=me_menu.MenuID'); 
		$this->db->where($condition);
		$query = $this->db->get();
        // Create a multidimensional array to contain a list of items and parents
        $cat = array(
            'items' => array(),
            'parents' => array()
        );
        // Builds the array lists with data from the menu table
        foreach ($query->result() as $cats) {
            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $cat['items'][$cats->MenuID] = $cats;
            // Creates entry into parents array. Parents array contains a list of all items with children
            $cat['parents'][$cats->MenuParent][] = $cats->MenuID;
        }

        if ($cat) {
            $result = $this->build_shortcut_main_menu(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }
}

?>