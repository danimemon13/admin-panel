<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MenuModal extends CI_Model {
    public function AddMenu(){}
    public function EditMenu(){}
    public function DeleteMenu(){}
    public function ShowMenu(){}
    public function ShowMenuBySearch($array){
        $this->db->select('me_menu.MenuID, me_menu.MenuName, me_menu.MenuLink,me_menu.MenuIcon,me_menu.MenuChild,me_menu.MenuParent');
		$this->db->from('me_menu');
		$this->db->join('me_menu_access','me_menu_access.MenuID=me_menu.MenuID'); 
		$this->db->where($array);
		$query = $this->db->get();
        return $query->result_array();
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
}

?>