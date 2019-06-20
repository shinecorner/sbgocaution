<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function responseHelper(&$data, $helpers = []) {
        foreach ($helpers as $key => $value) {
        	switch ($key) {
        		case 'statuses':
        			foreach($value as $status) {
        				$this->getStatusList($data, $status);
        			}
        			break;
        		
        		case 'other':
        			foreach($value as $helper) {
        				$data['helpers'][$helper] = getLeadSourcePlain();
        			}
        			break;
        	}
        }
    }

    /**
     * Returns the translated statues.
     * 
     * @param reference array of $data
     * @param string $status
     * @return void
     */
    private function getStatusList(&$data, $status) 
    {
        switch ($status) {
            case 'contact':
                $data['helpers']['statuses'][$status] = getContactStatusPlain();
                break;
            case 'contactPDF':
                $data['helpers']['statuses'][$status] = getContactPDFPlain();
                break;
            case 'policy':
                $data['helpers']['statuses'][$status] = getPolicyStatusPlain();
                break;
            case 'invoice':
                $data['helpers']['statuses'][$status] = getInvoiceStatusPlain();
                break;
        }
    }
}
