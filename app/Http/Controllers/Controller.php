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
                        switch ($helper) {
                            case 'lead_sources':
                                $data['helpers'][$helper] = getLeadSourcePlain();
                                break;
                            
                            case 'privatelandlord_kantons':
                                $data['helpers'][$helper] = getPrivatelandlordKantons();
                                break;

                            case 'privatelandlord_cities':
                                $data['helpers'][$helper] = getPrivatelandlordCities();
                                break;

                            case 'contact_salutation':
                                $data['helpers'][$helper] = getSalutationPlain();
                                break;

                            case 'privatelandlord_salutation':
                                $data['helpers'][$helper] = privatelandlordSalutationPlain();
                                break;

                            case 'brokers_cities':
                                $data['helpers'][$helper] = brokersCities();
                                break;

                            case 'users_roles':
                                $data['helpers'][$helper] = getRoleNames();
                                break;

                            case 'sections':
                                $data['helpers'][$helper] = getTemplateSections();
                                break;

                            case 'realestate_agency_kantons':
                                $data['helpers'][$helper] = getRealestateAgencyKantons();
                                break;
                                
                            case 'realestate_agency_cities':
                                $data['helpers'][$helper] = getRealestateAgencyCities();
                                break;

                            case 'houseowner_cities':
                                $data['helpers'][$helper] = getHouseOwnerCities();
                                break;

                            case 'houseowner_realestate_agencies':
                                $data['helpers'][$helper] = getRealestateAgencies();
                                break;

                            case 'role_permissions':
                                $data['helpers'][$helper] = getPermissions();
                                break;
                        }
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
            case 'realestateagency':
                $data['helpers']['statuses'][$status] = getPolicyRealestateAgencyStatusesPlain();
                break;
        }
    }

    protected function policy_count($query, $value, $accepted = 0) {
        if(in_array($value, range(1,5))) {
            $conditions = ['=', '=', '=', '=', '>=', '>='];
            $query->has('policies', $conditions[$value-1], $value - 1);
        } else if($value == 7) {
            $query->has('policies', '>=', 6);
            $query->has('policies', '<=', 10);
        } else if($value == 8) {
            $query->has('policies', '>=', 11);
            $query->has('policies', '<=', 20);
        } else if($value == 9) {
            $query->has('policies', '>=', 20);
        } else if(in_array($value, range(10,19))) {
            $query->has('policies', '>=', $value - 9);
        }
        if($accepted) {
            $query->whereHas('policies', function($query) {
                $query->where('status', '=', 'accepted');
            });
        }
    }
    
}
