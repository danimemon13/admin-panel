<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripePaymentController extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    public function index()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        $stripe = new \Stripe\StripeClient(
            $this->config->item('stripe_secret')
          );
        $bt = $stripe->charges->all(
            []
          );
        echo '<pre>';
        print_r($bt);
        echo '</pre>';
    }
    
    public function handlePayment()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => 100 * 120,
                "currency" => "inr",
                "source" => $this->input->post('stripeToken'),
                "description" => "Dummy stripe payment." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment has been successful.');
             
        redirect('/make-stripe-payment', 'refresh');
    }
}