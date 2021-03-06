<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$role_id = 1;
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='invoice' and me_menu_access.view_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		if(!empty($data["access"])){
			$this->load->template('invoice/index',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
    public function response(){
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$data["invoice"] = $this->invoicemodal->ShowInvoice();
		$data1 = [];
		$count=0;  
		$role_id = 1;
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='invoice' and me_menu_access.edit_access =1";
        $data["edit_access"] = $this->menumodal->ShowMenuBySearch($condition);
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='invoice' and me_menu_access.delete_access =1";
        $data["delete_access"] = $this->menumodal->ShowMenuBySearch($condition);
		   
		foreach($data["invoice"] as $r) {
			$LeadID = $r["InvoiceID"];
			//$LeadStatus = $r["LeadStatus"];
			//$data["LeadStatus"] = $this->leadmodal->LeadStatus($LeadStatus);
			$LeadIDencode = urlencode(base64_encode($LeadID));
			$btn = '';
            $InvoiceStatusbtn = '';
            if($r["InvoiceStatus"]==0){
                $InvoiceStatusbtn = '<button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light">Not Paid</button>';
            }
            if($r["InvoiceStatus"]==1){
                $InvoiceStatusbtn = '<button type="button" class="btn btn-info btn-sm btn-rounded waves-effect waves-light">Paid</button>';
            }
			//$LeadClass = $data["LeadStatus"][0]["StatusClass"];
			//$LeadStatusbtn = '<button type="button" class="'.$LeadClass.'">'.$data["LeadStatus"][0]["StatusName"].'</button>';
			if(!empty($data["edit_access"])){
				$btn .= '<a href="'.base_url().'leads/edit/'.$LeadIDencode.'" class="btn btn-soft-primary waves-effect waves-light">';
				$btn .= '<i class="mdi mdi-pencil font-size-16 align-middle" style="line-height: 1;"></i>';
				$btn .= '</a>';
			}
			if(!empty($data["delete_access"])){
			$btn .= '<button onClick="delete_department(this.id)" id="'.$LeadIDencode.'" type="button" class="btn btn-soft-danger waves-effect waves-light">';
			$btn .= '<i class="bx bx-block font-size-16 align-middle"></i>';
			$btn .= '</button>';
			}
			$data1[] = array(
				++$count,
				$r["InvoiceCode"],
                $r["amount"].' '.$r["currency"],
				$r["LeadCode"],
				$r["CustomerName"],
                $r["CustomerEmail"],
				$r["CustomerNumber"],
				$InvoiceStatusbtn,
				'',
                $r["BrandsName"],
				date("d-M-Y", strtotime($r["CreatedAt"])),
				$btn
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data["invoice"]),
			"recordsFiltered" => count($data["invoice"]),
			"data" => $data1
		);
		echo json_encode($result);
    }
    public function dashboard(){
        echo "Dashboard";
    }
	public function marketing_reference(){
		$this->load->template('brands/marketing_reference','',1);
	}
	public function add()
	{
		$role_id = 1;
		
		$condition = "me_menu_access.RoleID =" . "'" . $role_id . "' and me_menu.MenuLink='invoice' and me_menu_access.add_access =1";
        $data["access"] = $this->menumodal->ShowMenuBySearch($condition);
		$data["brands"] = $this->brandmodal->ShowBrand();
        $data["currency"] = $this->currencymodal->ShowCurrency();
		if(!empty($data["access"])){
			$this->load->template('invoice/add',$data,1);
		}
		else{
			$this->load->template('error/permission',$data,1);
		}
	}
	public function process(){
		$lead_code = $_POST["LeadCode"];
        $array = array("LeadCode"=>$lead_code);
        $data["lead"] = $this->leadmodal->ShowLeadBySearch($array);
        if(empty($data["lead"])){
            echo "Invalid Lead Code";
        }
        else{
            $LeadID = $data["lead"][0]["LeadID"];
            $data["CountInvoice"] = $this->invoicemodal->CountInvoice();
		    $old_InvoiceCode = $data["CountInvoice"][0]["count"]+1;
		    $InvoiceCode = 'INV-'.$old_InvoiceCode;
            $array = array(
                "LeadID"=>$LeadID,
                "InvoiceCode"=>$InvoiceCode,
                "BrandsID"=>$_POST["BrandsID"],
                "amount"=>$_POST["amount"],
                "currency"=>$_POST["currency"],
                "CreatedAt"=>date('Y-m-d'),
				"LastUpdate"=>date('Y-m-d'),
				"CreatedBy"=>1,
				"UpdatedBy"=>1,
            );
            $data["save"] = $this->invoicemodal->AddInvoice($array);
			if($data["save"]>0){
				echo "Invoice Created";
			}
        }
	}
}
