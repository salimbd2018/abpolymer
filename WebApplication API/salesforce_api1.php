<?php
header('Content-Type: application/json');

// Enable CORS headers
header("Access-Control-Allow-Origin: *"); // Replace * with your domain if you want to restrict access
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Handle preflight OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}




// Define the CORS function
function cors() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); // Cache for 1 day
    }

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        }
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        }
        exit(0); // End the request for OPTIONS preflight requests
    }
}

// Include the database connection
require_once 'db_connection.php';

// Get the request method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Define the possible actions based on the method and action
switch ($method) {
    case 'GET':
		
		
			
		if ($action == 'get_challansOrder') {
            get_challansOrder($conn);
        } else 
		
		if ($action == 'get_challansSpecimen') {
            get_challansSpecimen($conn);
        } else 	
		
		if ($action == 'get_challan' && isset($_GET['ChallanID'])) {
            get_challan($conn, $_GET['ChallanID']);
        } else 
       
		if ($action == 'get_invoices') {
            get_invoices($conn);
        } else if ($action == 'get_invoice' && isset($_GET['InvoiceID'])) {
            get_invoice($conn, $_GET['InvoiceID']);
        } else 
		
		if ($action == 'get_returns') {
            get_returns($conn);
        } else if ($action == 'get_return' && isset($_GET['ReturnID'])) {
            get_return($conn, $_GET['ReturnID']);
        } else 
		
		if ($action == 'get_damages') {
            get_damages($conn);
        } else if ($action == 'get_damage' && isset($_GET['DamageID'])) {
            get_damage($conn, $_GET['DamageID']);
        } else 
		
		 if ($action == 'get_moneyreceipts') {
            get_moneyreceipts($conn);
        } else if ($action == 'get_moneyreceipt' && isset($_GET['MRID'])) {
            get_moneyreceipt($conn, $_GET['MRID']);
        } else 
			
		if ($action == 'get_PaymentMethod') {
            get_PaymentMethod($conn);
        } else
		if ($action == 'get_salesorders') {
            get_salesorders($conn);
        } else if ($action == 'get_specimenorders') {
            get_specimenorders($conn);
        } else if ($action == 'get_order' && isset($_GET['SalesOrderID'])) {
            get_order($conn, $_GET['SalesOrderID']);
        } else if ($action == 'get_orderforchallan' && isset($_GET['SalesOrderID'])) {
            get_orderforchallan($conn, $_GET['SalesOrderID']);
        } 
		
		
		else if ($action == 'get_salesorderssingle' && isset($_GET['SalesOrderID'])) {
            get_salesorderssingle($conn, $_GET['SalesOrderID']);
        } else if ($action == 'get_specimenorderssingle' && isset($_GET['SalesOrderID'])) {
            get_specimenorderssingle($conn, $_GET['SalesOrderID']);
        } else if ($action == 'get_salesorderdetails' && isset($_GET['SalesOrderID'])) {
            get_salesorderdetails($conn, $_GET['SalesOrderID']);
        } else if ($action == 'get_salesorderdetailssingle' && isset($_GET['SalesOrderDetailsID'])) {
            get_salesorderdetailssingle($conn, $_GET['SalesOrderDetailsID']);
        } else if ($action == 'get_salesordersApproval' && isset($_GET['UserID'])) {
            get_salesordersApproval($conn, $_GET['UserID']);
        } else if ($action == 'get_salesordersCompleteRejectCancelled' && isset($_GET['UserID'])) {
            get_salesordersCompleteRejectCancelled($conn, $_GET['UserID']);
		} else if ($action == 'get_salesordersSpecemenApproval' && isset($_GET['UserID'])) {
            get_salesordersSpecemenApproval($conn, $_GET['UserID']);
        } else if ($action == 'get_salesordersSpecemanCompleteRejectCancelled' && isset($_GET['UserID'])) {
            get_salesordersSpecemanCompleteRejectCancelled($conn, $_GET['UserID']);	
			
		
        } else if ($action == 'get_salesordersChallan') {
            get_salesordersChallan($conn);
        } else
			
		
		if ($action == 'get_visit_plans') {
            get_all_visit_plans($conn);
        } else if ($action == 'get_visit_plan' && isset($_GET['VisitPlanID'])) {
            get_visit_plan($conn, $_GET['VisitPlanID']);
        } else 
		
		if ($action == 'get_visit_entries') {
            get_all_visit_entries($conn);
        } else if ($action == 'get_visit_entry' && isset($_GET['VisitPlanID'])) {
            get_visit_entry($conn, $_GET['VisitPlanID']);
        } else 
	
		if ($action == 'get_institutions') {
            get_all_institutions($conn);
        } else if ($action == 'get_institution' && isset($_GET['institutionID'])) {
            get_institution($conn, $_GET['institutionID']);
        } else 
			
		if ($action == 'get_institutionDetails' && isset($_GET['institutionDetailsID'])) {
            get_institutionDetails($conn, $_GET['institutionDetailsID']);
        } else
		
		
		if ($action == 'get_parties') {
            get_all_parties($conn);
        } else 
			
		if ($action == 'get_party' && isset($_GET['PartyID'])) {
            get_party($conn, $_GET['PartyID']);
        } else 
			
			
		if ($action == 'get_UserMenuPermissionsSettings' && isset($_GET['UserID'])) {
            get_UserMenuPermissionsSettings($conn, $_GET['UserID']);
        } else 
			
			if ($action == 'get_UserMenuPermissionsBasic' && isset($_GET['UserID'])) {
            get_UserMenuPermissionsBasic($conn, $_GET['UserID']);
        } else 
			
			if ($action == 'get_UserMenuPermissionsTransaction' && isset($_GET['UserID'])) {
            get_UserMenuPermissionsTransaction($conn, $_GET['UserID']);
        } else 
			
			if ($action == 'get_UserMenuPermissionsReports' && isset($_GET['UserID'])) {
            get_UserMenuPermissionsReports($conn, $_GET['UserID']);
        } else 
			
			if ($action == 'get_UserMenuPermissions' && isset($_GET['UserID'])) {
            get_UserMenuPermissions($conn, $_GET['UserID']);
        } else 
			
		if ($action == 'get_partydetailsAndroid' && isset($_GET['PartyID'])) {
            get_partydetailsAndroid($conn, $_GET['PartyID']);
		}else if ($action == 'get_parties_users' && isset($_GET['UserID'])) {
            get_parties_users($conn, $_GET['UserID']);
        } else     			
			
		if ($action == 'get_bindingparties') {
            get_all_bindingparties($conn);
        } else
		
		if ($action == 'get_partydetailsAreas' && isset($_GET['PartyID'])) {
            get_partydetailsAreas($conn, $_GET['PartyID']);
        } else 
			
		if ($action == 'get_partydetails' && isset($_GET['PartyID'])) {
            get_partydetails($conn, $_GET['PartyID']);
		}	
		else 
			
		if ($action == 'get_regions') {
            get_all_regions($conn);
        } else if ($action == 'get_region' && isset($_GET['RegionID'])) {
            get_region($conn, $_GET['RegionID']);
        } else 
			
		if ($action == 'get_location' && isset($_GET['RegionID'])) {
            get_location($conn, $_GET['RegionID']);
        } else 	
			
		if ($action == 'get_singlearealocation' && isset($_GET['RegionID'])) {
            get_singlearealocation($conn, $_GET['RegionID']);
        } else 	
		
			
		if ($action == 'get_regionview' && isset($_GET['AreaRegionID'])) {
            get_regionview($conn, $_GET['AreaRegionID']);
        } else 
			
		if ($action == 'get_parentregions' && isset($_GET['RegionTypeID'])) {
            get_parentregions($conn, $_GET['RegionTypeID']);
        } else 
			
		if ($action == 'get_regionDivision') {
            get_all_regionDivision($conn);
        } else if ($action == 'get_regionDistrict' && isset($_GET['ParentRegionID'])) {
            get_regionDistrict($conn, $_GET['ParentRegionID']);
		} else if ($action == 'get_regionThana' && isset($_GET['ParentRegionID'])) {
            get_regionThana($conn, $_GET['ParentRegionID']);
		} else if ($action == 'get_regionArea' && isset($_GET['ParentRegionID'])) {
            get_regionArea($conn, $_GET['ParentRegionID']);
        } else 
		
		 if ($action == 'get_products') {
            get_all_products($conn);
        } else if ($action == 'get_product' && isset($_GET['ProductID'])) {
            get_product($conn, $_GET['ProductID']);
        } else if ($action == 'get_productcategorywise' && isset($_GET['Categoryid'])) {
            get_productcategorywise($conn, $_GET['Categoryid']);
        } else 
			
		if ($action == 'get_productrate' && isset($_GET['FinancialYearID']) && isset($_GET['ProductID'])) {
            get_productrate($conn, $_GET['FinancialYearID'], $_GET['ProductID']);
        } else
		
	if ($action == 'get_salesordersAutorizationMIS' && isset($_GET['SalesOrderID'])) {
            get_salesordersAutorizationMIS($conn, $_GET['SalesOrderID']);
        } else
	
		if ($action == 'get_demand_collections') {
            get_all_demand_collections($conn);
        } else if ($action == 'get_demand_collection' && isset($_GET['DemandID'])) {
            get_demand_collection($conn, $_GET['DemandID']);
        } else 
		
		if ($action == 'get_sndUsers' && !isset($_GET['UserID'])) {
			get_all_sndUsers($conn); // Fetch all users
		} else if ($action == 'get_sndUser' && isset($_GET['UserID'])) {
		get_sndUser($conn, $_GET['UserID']); // Fetch a single user
		} 
		 else if ($action == 'sndListoftheUserview' && isset($_GET['UserID'])) {
		sndListoftheUserview($conn, $_GET['UserID']); // Fetch a single user
		}
		
		else 
			
		if ($action == 'get_all_ReportUser' && isset($_GET['DesignationID'])) {
		get_all_ReportUser($conn, $_GET['DesignationID']); // Fetch a single user
		} else 
			
		if ($action == 'get_reporttoUsers') {
            get_all_reporttoUsers($conn);
		}else 
		
		if ($action == 'get_classinfos') {
            get_all_classinfos($conn);
        } else if ($action == 'get_classinfo' && isset($_GET['ID'])) {
            get_classinfo($conn, $_GET['ID']);
        } else 
			
		if ($action == 'get_mappings') {
            get_all_mappings($conn);
        } else if ($action == 'get_mapping' && isset($_GET['ID'])) {
            get_mapping($conn, $_GET['ID']);
        } else
			
		if ($action == 'get_subjectinfos') {
            get_all_subjectinfos($conn);
        } else if ($action == 'get_subjectinfo' && isset($_GET['ID'])) {
            get_subjectinfo($conn, $_GET['ID']);
        } else 
			
		if ($action == 'get_desigs') {
            get_all_desigs($conn);
        } else if ($action == 'get_desig' && isset($_GET['ID'])) {
            get_desig($conn, $_GET['ID']);
        } else 
			
		if ($action == 'get_userview' && isset($_GET['PDesignationID'])) {
            get_userview($conn, $_GET['PDesignationID']);
        } else 
		
	
	
		if ($action == 'get_usermapregion' && isset($_GET['EmployeeID'])) {
            get_usermapregion($conn, $_GET['EmployeeID']);
        } else if ($action == 'get_allusermapregion') {
            get_allusermapregion($conn);
        } else 
		
	
	//get_allusermapregionsingle($conn, $EmployeeID)
			
		if ($action == 'get_partydoctypes') {
            get_all_partydoctypes($conn);
        } else if ($action == 'get_partydoctype' && isset($_GET['PartyDocsTypeID'])) {
            get_partydoctype($conn, $_GET['PartyDocsTypeID']);
        } else 
			
		if ($action == 'get_partyDocs' && isset($_GET['PartyID'])) {
            get_partyDocs($conn, $_GET['PartyID']);
        } else 
			
		if ($action == 'get_regiontypes') {
            get_all_regiontypes($conn);
        } else if ($action == 'get_regiontype' && isset($_GET['ID'])) {
            get_regiontype($conn, $_GET['ID']);
        } else 
			
		if ($action == 'get_regiontype1') {
            get_all_regiontype($conn);
        } else 
			
		if ($action == 'get_visitpurposes') {
            get_all_visitpurposes($conn);
        } else if ($action == 'get_visitpurpose' && isset($_GET['ID'])) {
            get_visitpurpose($conn, $_GET['ID']);
        } else 
			
		if ($action == 'get_institutiontypes') {
            get_all_institutiontypes($conn);
        } else if ($action == 'get_institutiontype' && isset($_GET['ID'])) {
            get_institutiontype($conn, $_GET['ID']);
        } else 
		
		if ($action == 'get_bookscategorys') {
            get_all_bookscategorys($conn);
        } else if ($action == 'get_bookscategory' && isset($_GET['ID'])) {
            get_bookscategory($conn, $_GET['ID']);
        } else 
			
		if ($action == 'get_tada_allowances') {
            get_all_tada_allowances($conn);
        } else if ($action == 'get_tada_allowance' && isset($_GET['ID'])) {
            get_tada_allowance($conn, $_GET['ID']);
        } else 
			
		 if ($action == 'get_production_orders') {
            get_production_orders($conn);
        } else if ($action == 'get_production_order' && isset($_GET['ProductionOrderID'])) {
            get_production_order($conn, $_GET['ProductionOrderID']);
        } else 
			
		if ($action == 'get_preceipts') {
            get_preceipts($conn);
        } else if ($action == 'get_preceipt' && isset($_GET['ProductReceiptID'])) {
            get_preceipt($conn, $_GET['ProductReceiptID']);
        } else	
			
		if ($action == 'get_ppreceipts') {
            get_ppreceipts($conn);
        } else if ($action == 'get_ppreceipt' && isset($_GET['ProductReceiptID'])) {
            get_ppreceipt($conn, $_GET['ProductReceiptID']);
        } else	if ($action == 'get_ppreceiptall' && isset($_GET['ProductReceiptID'])) {
            get_ppreceiptall($conn, $_GET['ProductReceiptID']);
        } else	
		
	
		if ($action == 'get_transfers') {
            get_transfers($conn);
        } else if ($action == 'get_transfer' && isset($_GET['TransferID'])) {
            get_transfer($conn, $_GET['TransferID']);
        } else
			
		if ($action == 'get_financialyears') {
            get_all_financialyears($conn);
        } else if ($action == 'get_financialyear') {
            get_financialyear($conn);
        } else {
            echo json_encode(["error" => "Invalid API action"]);
        }
		
        break;

    case 'POST':
	
		if ($action == 'login') {
            user_login($conn);
        } else
			
		if ($action == 'login1') {
            user_login1($conn);
        } else
        
	if ($action == 'create_ChallanMaster') {
            create_ChallanMaster($conn);
        } 
        
		if ($action == 'create_invoice') {
            create_invoice($conn);
        } else if ($action == 'create_invoice_detail') {
            create_invoice_detail($conn);
        } else 
		
		if ($action == 'create_return') {
            create_return($conn);
        } else if ($action == 'create_return_detail') {
            create_return_detail($conn);
        } else 
		
		if ($action == 'create_damage') {
            create_damage($conn);
        } else if ($action == 'create_damage_detail') {
            create_damage_detail($conn);
        } else 
		
		if ($action == 'create_moneyreceipt') {
            create_moneyreceipt($conn);
        } else 
		
		if ($action == 'create_order') {
            create_order($conn);
        } else
			
		if ($action == 'create_order_master') {
            create_order_master($conn);
        } else
			
		if ($action == 'create_sndApprovalDetails') {
			create_sndApprovalDetails($conn);
		} else
			 
		if ($action == 'create_sndApprovalRejected_Cancelled') {
			create_sndApprovalRejected_Cancelled($conn);
		} else
			
		 
		if ($action == 'create_order_details') {
			create_order_details($conn);
		} else
			
		if ($action == 'create_ppreceiptdetails') {
			create_ppreceiptdetails($conn);
		} else
	
if ($action == 'create_ppreceiptall') {
			create_ppreceiptall($conn);
		} else
	
		if ($action == 'create_visit_plan') {
            create_visit_plan($conn);
        } else 
		
		if ($action == 'create_institution') {
            create_institution($conn);
        } else 
			
		if ($action == 'create_institutionAndroid') {
            create_institutionAndroid($conn);
        } else 
			
		if ($action == 'create_institutionDetailsAndroid') {
            create_institutionDetailsAndroid($conn);
        } else 
		
		 if ($action == 'create_party') {
            create_party($conn);
        } else 
			
		 if ($action == 'create_partydetails') {
            create_partydetails($conn);
        } else 
			
		if ($action == 'create_partydetailsAndroid') {
            create_partydetailsAndroid($conn);
        } else 
			
		if ($action == 'create_partydetailsAreas' && isset($_GET['PartyID'])) {
			create_partydetailsAreas($conn, $_GET['PartyID']);
		} else
			
					
		if ($action == 'create_partyDocs' && isset($_GET['PartyID'])) {
			create_partyDocs($conn, $_GET['PartyID']);
		} else 
		
		 if ($action == 'create_region') {
            create_region($conn);
        } else 
		
		 if ($action == 'create_product') {
            create_product($conn);
        } else 
		
		if ($action == 'create_demand_collection') {
            create_demand_collection($conn);
        } else 
		
		if ($action == 'create_sndUser') {
            create_sndUser($conn);
        } else 
	
		if ($action == 'create_mapping') {
            create_mapping($conn);
        } else 
	
		if ($action == 'create_classinfo') {
            create_classinfo($conn);
        } else 
			
		if ($action == 'create_subjectinfo') {
            create_subjectinfo($conn);
        } else 
			
		if ($action == 'create_desig') {
            create_desig($conn);
        } else 
			
		
		if ($action == 'create_visitpurpose') {
            create_visitpurpose($conn);
        } else 
			
		if ($action == 'create_institutiontype') {
            create_institutiontype($conn);
        } else 
			
		if ($action == 'create_bookscategory') {
            create_bookscategory($conn);
        } else 
			
		if ($action == 'create_tada_allowance') {
            create_tada_allowance($conn);
        } else 
			
		 if ($action == 'create_production_order') {
            create_production_order($conn);
        } else 
			
		 if ($action == 'generate_new_product_receipt_number') {
            generate_new_product_receipt_number($conn);
        } else 
			
	    if ($action == 'generate_new_salesorder_number') {
            generate_new_salesorder_number($conn);
        } else 
		
		if ($action == 'generate_new_Challan_number') {
            generate_new_Challan_number($conn);
        } else 
				
		if ($action == 'generate_new_money_receipt_number') {
            generate_new_money_receipt_number($conn);
        } else 
		
			
		if ($action == 'create_preceipt') {
            create_preceipt($conn);
        } else 
			
		if ($action == 'create_ppreceipt') {
            create_ppreceipt($conn);
        } else 
			
		if ($action == 'create_transfer') {
            create_transfer($conn);
        } else 
		
		if ($action == 'create_regiontype') {
            create_regiontype($conn);
        } else {
            echo json_encode(["error" => "Invalid API action"]);
        }
		
        break;

    case 'PUT':
        if ($action == 'update_challan' && isset($_GET['ChallanID'])) {
            update_challan($conn, $_GET['ChallanID']);
        } else if ($action == 'update_challan_detail' && isset($_GET['ChallanDetailID'])) {
            update_challan_detail($conn, $_GET['ChallanDetailID']);
        } else 
       
		
		if ($action == 'update_invoice' && isset($_GET['InvoiceID'])) {
            update_invoice($conn, $_GET['InvoiceID']);
        } else if ($action == 'update_invoice_detail' && isset($_GET['InvoiceDetailID'])) {
            update_invoice_detail($conn, $_GET['InvoiceDetailID']);
        } else 
		
		 if ($action == 'update_return' && isset($_GET['ReturnID'])) {
            update_return($conn, $_GET['ReturnID']);
        } else if ($action == 'update_return_detail' && isset($_GET['ReturnDetailID'])) {
            update_return_detail($conn, $_GET['ReturnDetailID']);
        } else 
		
		if ($action == 'update_damage' && isset($_GET['DamageID'])) {
            update_damage($conn, $_GET['DamageID']);
        } else if ($action == 'update_damage_detail' && isset($_GET['DamageDetailID'])) {
            update_damage_detail($conn, $_GET['DamageDetailID']);
        } else 
		
		if ($action == 'update_moneyreceipt' && isset($_GET['MRID'])) {
            update_moneyreceipt($conn, $_GET['MRID']);
        } else 
		
		if ($action == 'update_salesorderssingle' && isset($_GET['SalesOrderID'])) {
            update_salesorderssingle($conn, $_GET['SalesOrderID']);
        } else 
			
		if ($action == 'update_SalesOrders' && isset($_GET['SalesOrderID'])) {
            update_SalesOrders($conn, $_GET['SalesOrderID']);
        } else 
	
		 if ($action == 'update_order' && isset($_GET['SalesOrderID'])) {
            update_order($conn, $_GET['SalesOrderID']);
        } else
		
		
		if ($action == 'update_visit_plan' && isset($_GET['VisitPlanID'])) {
            update_visit_plan($conn, $_GET['VisitPlanID']);
        } else 
		
		if ($action == 'update_institution' && isset($_GET['institutionID'])) {
            update_institution($conn, $_GET['institutionID']);
        } else 
			
		if ($action == 'update_institutionAndroid' && isset($_GET['institutionID'])) {
            update_institutionAndroid($conn, $_GET['institutionID']);
        } else 
			
		if ($action == 'update_institutionAndroidwithoutimage' && isset($_GET['institutionID'])) {
            update_institutionAndroidwithoutimage($conn, $_GET['institutionID']);
        } else 
			
			if ($action == 'update_institutionwithoutimage' && isset($_GET['institutionID'])) {
            update_institutionwithoutimage($conn, $_GET['institutionID']);
        } else
		
		
		if ($action == 'update_institutionDetailsAndroid' && isset($_GET['InstitutionDetailsID'])) {
            update_institutionDetailsAndroid($conn, $_GET['InstitutionDetailsID']);
        } else 
		
		if ($action == 'update_party' && isset($_GET['PartyID'])) {
            update_party($conn, $_GET['PartyID']);
        } else 
		
		if ($action == 'update_partydetails' && isset($_GET['PartyID'])) {
            update_partydetails($conn, $_GET['PartyID']);
        } else 
			
		if ($action == 'update_partydetailsAndroid' && isset($_GET['PartyID'])) {
            update_partydetailsAndroid($conn, $_GET['PartyID']);
        } else 
			
		if ($action == 'update_partydetailsAreas' && isset($_GET['PartyID'])) {
            update_partydetailsAreas($conn, $_GET['PartyID']);
        } else 
			
		if ($action == 'update_partyDocs' && isset($_GET['PartyID'])) {
            update_partyDocs($conn, $_GET['PartyID']);
        } else 
	
	
		if ($action == 'update_region' && isset($_GET['RegionID'])) {
            update_region($conn, $_GET['RegionID']);
        } else 
		
		 if ($action == 'update_product' && isset($_GET['ProductID'])) {
            update_product($conn, $_GET['ProductID']);
        } else 
		
	 if ($action == 'update_ppreceiptall' && isset($_GET['ProductReceiptID'])) {
            update_ppreceiptall($conn, $_GET['ProductReceiptID']);
        } else 
	
		if ($action == 'update_demand_collection' && isset($_GET['DemandID'])) {
            update_demand_collection($conn, $_GET['DemandID']);
        } else 
		
		if ($action == 'update_sndUser' && isset($_GET['UserID'])) {
            update_sndUser($conn, $_GET['UserID']);
        } else 
			
		if ($action == 'update_sndUserWithoutImage' && isset($_GET['UserID'])) {
            update_sndUserWithoutImage($conn, $_GET['UserID']);
        } else 
				
			
		if ($action == 'update_sndUserStatus' && isset($_GET['UserID'])) {
            update_sndUserStatus($conn, $_GET['UserID']);
        } else 
			
		if ($action == 'update_institutiontype' && isset($_GET['ID'])) {
            update_institutiontype($conn, $_GET['ID']);
        } else 
			
		if ($action == 'update_bookscategory' && isset($_GET['ID'])) {
            update_bookscategory($conn, $_GET['ID']);
        } else 
			
		if ($action == 'update_tada_allowance' && isset($_GET['ID'])) {
            update_tada_allowance($conn, $_GET['ID']);
        } else 
			
		if ($action == 'update_regiontype' && isset($_GET['ID'])) {
            update_regiontype($conn, $_GET['ID']);
        } else 
			
		if ($action == 'update_visitpurpose') {
            update_visitpurpose($conn, $_GET['ID']);
        } else 
			
		if ($action == 'update_production_order' && isset($_GET['ProductionOrderID'])) {
            update_production_order($conn, $_GET['ProductionOrderID']);
        } else 
			
		 if ($action == 'update_preceipttext' && isset($_GET['ProductReceiptID'])) {
            update_preceipttext($conn, $_GET['ProductReceiptID']);
        } else if ($action == 'update_preceiptfile' && isset($_GET['ProductReceiptID'])) {
            update_preceiptfile($conn, $_GET['ProductReceiptID']);
        } else
			
		if ($action == 'update_transfer' && isset($_GET['TransferID'])) {
            update_transfer($conn, $_GET['TransferID']);
        } else
		
		if ($action == 'update_subjectinfo' && isset($_GET['ID'])) {
            update_subjectinfo($conn, $_GET['ID']);
        } else
			
					
		if ($action == 'update_mapping' && isset($_GET['ID'])) {
            update_mapping($conn, $_GET['ID']);
        } else	
	
		if ($action == 'update_classinfo' && isset($_GET['ID'])) {
            update_classinfo($conn, $_GET['ID']);
        } else
			
		if ($action == 'cancel_salesorder' && isset($_GET['SalesOrderID'])) {
            cancel_salesorder($conn, $_GET['SalesOrderID']);
        } else
			
		if ($action == 'update_desig' && isset($_GET['ID'])) {
            update_desig($conn, $_GET['ID']);
        } else {
            echo json_encode(["error" => "Invalid API action"]);
        }
		
        break;

    case 'DELETE':
        if ($action == 'delete_challan' && isset($_GET['ChallanID'])) {
            delete_challan($conn, $_GET['ChallanID']);
        } else if ($action == 'delete_challan_detail' && isset($_GET['ChallanDetailID'])) {
            delete_challan_detail($conn, $_GET['ChallanDetailID']);
        } else 
       
		
		 if ($action == 'delete_invoice' && isset($_GET['InvoiceID'])) {
            delete_invoice($conn, $_GET['InvoiceID']);
        } else if ($action == 'delete_invoice_detail' && isset($_GET['InvoiceDetailID'])) {
            delete_invoice_detail($conn, $_GET['InvoiceDetailID']);
        } else 
		
		if ($action == 'delete_return' && isset($_GET['ReturnID'])) {
            delete_return($conn, $_GET['ReturnID']);
        } else if ($action == 'delete_return_detail' && isset($_GET['ReturnDetailID'])) {
            delete_return_detail($conn, $_GET['ReturnDetailID']);
        } else 
		
		 if ($action == 'delete_damage' && isset($_GET['DamageID'])) {
            delete_damage($conn, $_GET['DamageID']);
        } else if ($action == 'delete_damage_detail' && isset($_GET['DamageDetailID'])) {
            delete_damage_detail($conn, $_GET['DamageDetailID']);
        } else 
		
		if ($action == 'delete_receipt' && isset($_GET['ReceiptID'])) {
            delete_receipt($conn, $_GET['ReceiptID']);
        } else 
		
		 if ($action == 'delete_order' && isset($_GET['SalesOrderID'])) {
            delete_order($conn, $_GET['SalesOrderID']);
        } else
		
				
		if ($action == 'delete_visit_plan' && isset($_GET['VisitPlanID'])) {
            delete_visit_plan($conn, $_GET['VisitPlanID']);
        } else 
		
		if ($action == 'delete_institution' && isset($_GET['institutionID'])) {
            delete_institution($conn, $_GET['institutionID']);
        } else 
			
		if ($action == 'delete_preceiptdetails' && isset($_GET['ProductReceiptDetailsID'])) {
            delete_preceiptdetails($conn, $_GET['ProductReceiptDetailsID']);
        } else 
		
		if ($action == 'delete_party' && isset($_GET['PartyID'])) {
            delete_party($conn, $_GET['PartyID']);
        } else 
		
		
		if ($action == 'delete_region' && isset($_GET['RegionID'])) {
            delete_region($conn, $_GET['RegionID']);
        } else 
		
		
		if ($action == 'delete_product' && isset($_GET['ProductID'])) {
            delete_product($conn, $_GET['ProductID']);
        } else 
		
		 if ($action == 'delete_demand_collection' && isset($_GET['DemandID'])) {
            delete_demand_collection($conn, $_GET['DemandID']);
        } else 
		
		if ($action == 'delete_sndUser' && isset($_GET['UserID'])) {
            delete_sndUser($conn, $_GET['UserID']);
        } else 		
		
		if ($action == 'delete_production_order' && isset($_GET['ProductionOrderID'])) {
            delete_production_order($conn, $_GET['ProductionOrderID']);
        } else 
			
		 if ($action == 'delete_preceipt' && isset($_GET['ProductReceiptID'])) {
            delete_preceipt($conn, $_GET['ProductReceiptID']);
        } else
			
		if ($action == 'delete_transfer' && isset($_GET['TransferID'])) {
            delete_transfer($conn, $_GET['TransferID']);
        } else
			
		if ($action == 'delete_mapping' && isset($_GET['ID'])) {
            delete_mapping($conn, $_GET['ID']);
        } else
			
		if ($action == 'delete_partyDocs' && isset($_GET['PartyDocsID'])) {
            delete_partyDocs($conn, $_GET['PartyDocsID']);
        } else
			
		if ($action == 'delete_SalesOrderDetails' && isset($_GET['SalesOrderDetailID'])) {
            delete_SalesOrderDetails($conn, $_GET['SalesOrderDetailID']);
        } else
			
		if ($action == 'delete_desig' && isset($_GET['ID'])) {
            delete_desig($conn, $_GET['ID']);
        } else 		{
            echo json_encode(["error" => "Invalid API action"]);
        }
		
		
        break;		

	
    default:
        echo json_encode(["error" => "Unsupported request method"]);
        break;
}

// Close the connection
sqlsrv_close($conn);


// Function to handle user login
function user_login1($conn) {
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (!isset($inputData['Username']) || !isset($inputData['Password'])) {
        echo json_encode(["error" => "Username and Password are required"]);
        return;
    }

    $Username = $inputData['Username'];
    $Password = $inputData['Password'];

    // Query to verify user credentials
    $query = "SELECT UserID, EmployeeID, Username, Password, EmpName, Email, Phone, Userpicture, ReportingToUserID FROM sndUsers WHERE status = 1 and Username = ?";
    $params = array($Username);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error validating login: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $storedHashedPassword = $row['Password'];

        // Hash the input password and compare it with the stored hashed Password
        if (hash('sha256', $Password) === $storedHashedPassword) {
            echo json_encode([
                "success" => true,
                "message" => "Login successful",
                "user" => [
                    "UserID" => $row['UserID'],
                    "EmployeeID" => $row['EmployeeID'],
                    "Username" => $row['Username'],
                    "EmpName" => $row['EmpName'],
                    "Email" => $row['Email'],
                    "Phone" => $row['Phone'],
                    "Userpicture" => $row['Userpicture'],
                    "ReportingToUserID" => $row['ReportingToUserID']
                ]
            ]);
        } else {
            echo json_encode(["error" => "Invalid password"]);
        }
    } else {
        echo json_encode(["error" => "User not found"]);
    }
}

function user_login($conn) {
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (!isset($inputData['Username']) || !isset($inputData['Password'])) {
        echo json_encode(["error" => "Username and Password are required"]);
        return;
    }

    $Username = $inputData['Username'];
    $Password = $inputData['Password'];

    // Query to verify user credentials
    $query = "SELECT UserID, EmployeeID, Username, Password, EmpName, Email, Phone, Userpicture, ReportingToUserID 
              FROM sndUsers 
              WHERE status = 1 AND Username = ?";
    $params = array($Username);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error validating login: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $storedHashedPassword = $row['Password'];

        // Hash the input password and compare it with the stored hashed password
        if (hash('sha256', $Password) === $storedHashedPassword) {
            // Prepare Userpicture path
            $userPicturePath = $row['Userpicture'];
            if (!empty($userPicturePath) && file_exists($userPicturePath)) {
                $userPicturePath = 'https://asianabpolymer.com/abpolymer/' . $userPicturePath;
            } else {
                $userPicturePath = 'https://https://asianabpolymer.com/abpolymer/default_profile_picture.png';
            }

            echo json_encode([
                "success" => true,
                "message" => "Login successful",
                "user" => [
                    "UserID" => $row['UserID'],
                    "EmployeeID" => $row['EmployeeID'],
                    "Username" => $row['Username'],
                    "EmpName" => $row['EmpName'],
                    "Email" => $row['Email'],
                    "Phone" => $row['Phone'],
                    "Userpicture" => $userPicturePath,
                    "ReportingToUserID" => $row['ReportingToUserID']
                ]
            ]);
        } else {
            echo json_encode(["error" => "Invalid password"]);
        }
    } else {
        echo json_encode(["error" => "User not found"]);
    }
}


// Function to get all challans
function get_challansOrder($conn) {
    $sql = "SELECT ChallanID, ChallanNo, convert(char(11),ChallanDate,120) as ChallanDate, PartyID, 
(select partyname from sndPartyMaster where PartyID = sndDeliveryChallanMaster.PartyID) as PartyName,SalesOrderID,
(select (select SalesOrderTypeID from sndSalesOrderType where sndSalesOrderType.SalesOrderTypeID = sndSalesOrders.OrderTypeID) as SalesOrderTypeID from sndSalesOrders where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID) as SalesOrderTypeID,
(select (select SalesOrder from sndSalesOrderType where sndSalesOrderType.SalesOrderTypeID = sndSalesOrders.OrderTypeID) as SalesOrderTypeID from sndSalesOrders where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID) as SalesOrderType,
Status,
(select Statusmeans from sndStatus where status = sndDeliveryChallanMaster.status and statustables = 'sndDeliveryChallan') as StatusName 
FROM sndDeliveryChallanMaster where
(select (select SalesOrderTypeID from sndSalesOrderType where sndSalesOrderType.SalesOrderTypeID = sndSalesOrders.OrderTypeID) as SalesOrderTypeID from sndSalesOrders where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID) =1
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching challans: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challans = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $challans[] = $row;
    }

    echo json_encode($challans);
}

// Function to get all challans
function get_challansSpecimen($conn) {
    $sql = "SELECT ChallanID, ChallanNo, convert(char(11),ChallanDate,120) as ChallanDate, PartyID, 
(select partyname from sndPartyMaster where PartyID = sndDeliveryChallanMaster.PartyID) as PartyName,SalesOrderID,
(select (select SalesOrderTypeID from sndSalesOrderType where sndSalesOrderType.SalesOrderTypeID = sndSalesOrders.OrderTypeID) as SalesOrderTypeID from sndSalesOrders where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID) as SalesOrderTypeID,
(select (select SalesOrder from sndSalesOrderType where sndSalesOrderType.SalesOrderTypeID = sndSalesOrders.OrderTypeID) as SalesOrderTypeID from sndSalesOrders where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID) as SalesOrderType,
Status,
(select Statusmeans from sndStatus where status = sndDeliveryChallanMaster.status and statustables = 'sndDeliveryChallan') as StatusName 
FROM sndDeliveryChallanMaster where
(select (select SalesOrderTypeID from sndSalesOrderType where sndSalesOrderType.SalesOrderTypeID = sndSalesOrders.OrderTypeID) as SalesOrderTypeID from sndSalesOrders where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID) =2
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching challans: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challans = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $challans[] = $row;
    }

    echo json_encode($challans);
}


// Function to get a single challan by ID
function get_challan($conn, $ChallanID) {
    $sql = "SELECT * FROM sndDeliveryChallanMaster WHERE ChallanID = ?";
    $params = [$ChallanID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching challan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challan = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($challan) {
        echo json_encode($challan);
    } else {
        echo json_encode(["error" => "Challan not found"]);
    }
}

// Function to create a challan
function create_ChallanMaster($conn,$SalesOrderID) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate input for master data
    if (!isset($data['ChallanNo'], $data['ChallanDate'], $data['SalesOrderID'])) {
        echo json_encode(["error" => "Missing required fields or invalid details format"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert into sndDeliveryChallanMaster
        $sqlMaster = "INSERT INTO sndDeliveryChallanMaster 
		  ([ChallanNo]
           ,[ChallanDate]
           ,[SalesOrderID]
           ,[UserID]
           ,[CreatedAt])
           VALUES (?, ?, ?, ?, ?, ?, GETDATE())";
        $paramsMaster = [
            $data['ChallanNo'],
            $data['ChallanDate'],
            $data['SalesOrderID']
        ];
        $stmtMaster = sqlsrv_query($conn, $sqlMaster, $paramsMaster);

        if (!$stmtMaster) {
            throw new Exception("Error creating challan: " . print_r(sqlsrv_errors(), true));
        }

        // Get the last inserted ChallanID
        $queryLastID = "SELECT SCOPE_IDENTITY() AS ChallanID";
        $stmtLastID = sqlsrv_query($conn, $queryLastID);
        if ($stmtLastID === false || !($row = sqlsrv_fetch_array($stmtLastID, SQLSRV_FETCH_ASSOC))) {
            throw new Exception("Error retrieving ChallanID: " . print_r(sqlsrv_errors(), true));
        }
        $challanID = $row['ChallanID'];

        // Insert each detail into sndDeliveryChallanDetails
        $sqlDetail = "INSERT INTO sndDeliveryChallanDetails (ChallanID, ProductID, Quantity, UnitPrice, CreatedAt) 
                      VALUES (?, ?, ?, ?, GETDATE())";
        foreach ($data['Details'] as $detail) {
            if (!isset($detail['ProductID'], $detail['Quantity'], $detail['UnitPrice'])) {
                throw new Exception("Invalid detail format: " . json_encode($detail));
            }

            $paramsDetail = [
                $challanID,
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['UnitPrice']
            ];

            $stmtDetail = sqlsrv_query($conn, $sqlDetail, $paramsDetail);
            if (!$stmtDetail) {
                throw new Exception("Error creating challan detail: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        echo json_encode(["success" => "Challan and details created successfully", "ChallanID" => $challanID]);
    } catch (Exception $e) {
        // Rollback transaction in case of an error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

// Function to update a challan
function update_challan($conn, $ChallanID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndDeliveryChallanMaster SET ChallanNo = ?, ChallanDate = ?, SalesOrderID = ?, FromCompany = ?, PartyID = ?, TotalAmount = ?, ModifiedAt = GETDATE() WHERE ChallanID = ?";
    $params = [
        $data['ChallanNo'], 
        $data['ChallanDate'], 
        $data['SalesOrderID'], 
        $data['FromCompany'], 
        $data['PartyID'], 
        $data['TotalAmount'], 
        $ChallanID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Challan updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating challan: " . print_r(sqlsrv_errors(), true)]);
    }
}



// Function to get all invoices
function get_invoices($conn) {
    $sql = "SELECT * FROM sndInvoiceMaster";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching invoices: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $invoices = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $invoices[] = $row;
    }

    echo json_encode($invoices);
}

// Function to get a single invoice by ID
function get_invoice($conn, $InvoiceID) {
    $sqlMaster = "SELECT * FROM sndInvoiceMaster WHERE InvoiceID = ?";
    $paramsMaster = [$InvoiceID];
    $stmtMaster = sqlsrv_query($conn, $sqlMaster, $paramsMaster);

    if ($stmtMaster === false) {
        echo json_encode(["error" => "Error fetching invoice: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $invoiceMaster = sqlsrv_fetch_array($stmtMaster, SQLSRV_FETCH_ASSOC);

    $sqlDetails = "SELECT * FROM sndInvoiceDetails WHERE InvoiceID = ?";
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsMaster);

    $invoiceDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $invoiceDetails[] = $row;
    }

    $response = [
        "invoiceMaster" => $invoiceMaster,
        "invoiceDetails" => $invoiceDetails
    ];

    echo json_encode($response);
}

// Function to create an invoice
function create_invoice($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndInvoiceMaster (InvoiceNo, InvoiceDate, ChallanID, PartyID, TotalAmount, PaymentStatus, CreatedAt) 
            VALUES (?, ?, ?, ?, ?, ?, GETDATE())";
    $params = [
        $data['InvoiceNo'], 
        $data['InvoiceDate'], 
        $data['ChallanID'], 
        $data['PartyID'], 
        $data['TotalAmount'], 
        $data['PaymentStatus']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Invoice created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating invoice: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to create an invoice detail
function create_invoice_detail($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndInvoiceDetails (InvoiceID, ProductID, Quantity, UnitPrice, CreatedAt) 
            VALUES (?, ?, ?, ?, GETDATE())";
    $params = [
        $data['InvoiceID'], 
        $data['ProductID'], 
        $data['Quantity'], 
        $data['UnitPrice']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Invoice detail created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating invoice detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update an invoice
function update_invoice($conn, $InvoiceID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndInvoiceMaster SET InvoiceNo = ?, InvoiceDate = ?, ChallanID = ?, PartyID = ?, TotalAmount = ?, PaymentStatus = ?, ModifiedAt = GETDATE()
            WHERE InvoiceID = ?";
    $params = [
        $data['InvoiceNo'], 
        $data['InvoiceDate'], 
        $data['ChallanID'], 
        $data['PartyID'], 
        $data['TotalAmount'], 
        $data['PaymentStatus'], 
        $InvoiceID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Invoice updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating invoice: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update an invoice detail
function update_invoice_detail($conn, $InvoiceDetailID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndInvoiceDetails SET InvoiceID = ?, ProductID = ?, Quantity = ?, UnitPrice = ?, ModifiedAt = GETDATE()
            WHERE InvoiceDetailID = ?";
    $params = [
        $data['InvoiceID'], 
        $data['ProductID'], 
        $data['Quantity'], 
        $data['UnitPrice'], 
        $InvoiceDetailID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Invoice detail updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating invoice detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete an invoice
function delete_invoice($conn, $InvoiceID) {
    $sqlDetails = "DELETE FROM sndInvoiceDetails WHERE InvoiceID = ?";
    $paramsDetails = [$InvoiceID];
    sqlsrv_query($conn, $sqlDetails, $paramsDetails);

    $sqlMaster = "DELETE FROM sndInvoiceMaster WHERE InvoiceID = ?";
    $stmtMaster = sqlsrv_query($conn, $sqlMaster, $paramsDetails);

    if ($stmtMaster) {
        echo json_encode(["success" => "Invoice deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting invoice: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete an invoice detail
function delete_invoice_detail($conn, $InvoiceDetailID) {
    $sql = "DELETE FROM sndInvoiceDetails WHERE InvoiceDetailID = ?";
    $params = [$InvoiceDetailID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Invoice detail deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting invoice detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to get all sales returns
function get_returns($conn) {
    $sql = "SELECT * FROM sndSalesReturnMaster";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching sales returns: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $returns = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $returns[] = $row;
    }

    echo json_encode($returns);
}

// Function to get a single sales return by ID
function get_return($conn, $ReturnID) {
    $sql = "SELECT * FROM sndSalesReturnMaster WHERE ReturnID = ?";
    $params = [$ReturnID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching sales return: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $return = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($return) {
        echo json_encode($return);
    } else {
        echo json_encode(["error" => "Sales return not found"]);
    }
}

// Function to create a sales return
function create_return($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndSalesReturnMaster (ReturnNumber, PartyID, ReturnDate, UserID, CreatedAt, ModifiedAt) 
            VALUES (?, ?, ?, ?, GETDATE(), GETDATE())";
    $params = [
        $data['ReturnNumber'], 
        $data['PartyID'], 
        $data['ReturnDate'], 
        $data['UserID']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Sales return created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating sales return: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to create a sales return detail
function create_return_detail($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndSalesReturnDetails (ReturnID, FinancialYearID, ProductCategoryID, ProductID, ProductName, Quantity, ReturnReason, CreatedAt, ModifiedAt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";
    $params = [
        $data['ReturnID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['ProductName'], 
        $data['Quantity'], 
        $data['ReturnReason']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Sales return detail created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating sales return detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a sales return
function update_return($conn, $ReturnID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndSalesReturnMaster SET ReturnNumber = ?, PartyID = ?, ReturnDate = ?, UserID = ?, ModifiedAt = GETDATE() 
            WHERE ReturnID = ?";
    $params = [
        $data['ReturnNumber'], 
        $data['PartyID'], 
        $data['ReturnDate'], 
        $data['UserID'], 
        $ReturnID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Sales return updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating sales return: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a sales return detail
function update_return_detail($conn, $ReturnDetailID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndSalesReturnDetails SET ReturnID = ?, FinancialYearID = ?, ProductCategoryID = ?, ProductID = ?, ProductName = ?, Quantity = ?, ReturnReason = ?, ModifiedAt = GETDATE() 
            WHERE ReturnDetailID = ?";
    $params = [
        $data['ReturnID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['ProductName'], 
        $data['Quantity'], 
        $data['ReturnReason'], 
        $ReturnDetailID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Sales return detail updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating sales return detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete a sales return
function delete_return($conn, $ReturnID) {
    $sqlDetails = "DELETE FROM sndSalesReturnDetails WHERE ReturnID = ?";
    $paramsDetails = [$ReturnID];
    sqlsrv_query($conn, $sqlDetails, $paramsDetails);

    $sqlMaster = "DELETE FROM sndSalesReturnMaster WHERE ReturnID = ?";
    $stmtMaster = sqlsrv_query($conn, $sqlMaster, $paramsDetails);

    if ($stmtMaster) {
        echo json_encode(["success" => "Sales return deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting sales return: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete a sales return detail
function delete_return_detail($conn, $ReturnDetailID) {
    $sql = "DELETE FROM sndSalesReturnDetails WHERE ReturnDetailID = ?";
    $params = [$ReturnDetailID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Sales return detail deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting sales return detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to get all damages
function get_damages($conn) {
    $sql = "SELECT * FROM sndDamageMaster";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching damages: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $damages = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $damages[] = $row;
    }

    echo json_encode($damages);
}

// Function to get a single damage by ID
function get_damage($conn, $DamageID) {
    $sql = "SELECT * FROM sndDamageMaster WHERE DamageID = ?";
    $params = [$DamageID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching damage: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $damage = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($damage) {
        $sqlDetails = "SELECT * FROM sndDamageDetails WHERE DamageID = ?";
        $stmtDetails = sqlsrv_query($conn, $params);

        $damageDetails = [];
        while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
            $damageDetails[] = $row;
        }

        $response = [
            "damageMaster" => $damage,
            "damageDetails" => $damageDetails
        ];

        echo json_encode($response);
    } else {
        echo json_encode(["error" => "Damage not found"]);
    }
}

// Function to create a damage
function create_damage($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndDamageMaster (DamageNumber, DamageDate, ApprovedByUserID, CreatedAt) VALUES (?, ?, ?, GETDATE())";
    $params = [
        $data['DamageNumber'], 
        $data['DamageDate'], 
        $data['ApprovedByUserID']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Damage created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating damage: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to create a damage detail
function create_damage_detail($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndDamageDetails (DamageID, FinancialYearID, ProductCategoryID, ProductID, ProductName, Quantity, DamageReason, CreatedAt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE())";
    $params = [
        $data['DamageID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['ProductName'], 
        $data['Quantity'], 
        $data['DamageReason']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Damage detail created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating damage detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a damage
function update_damage($conn, $DamageID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndDamageMaster SET DamageNumber = ?, DamageDate = ?, ApprovedByUserID = ?, ModifiedAt = GETDATE() WHERE DamageID = ?";
    $params = [
        $data['DamageNumber'], 
        $data['DamageDate'], 
        $data['ApprovedByUserID'], 
        $DamageID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Damage updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating damage: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a damage detail
function update_damage_detail($conn, $DamageDetailID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndDamageDetails SET DamageID = ?, FinancialYearID = ?, ProductCategoryID = ?, ProductID = ?, ProductName = ?, Quantity = ?, DamageReason = ?, ModifiedAt = GETDATE() WHERE DamageDetailID = ?";
    $params = [
        $data['DamageID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['ProductName'], 
        $data['Quantity'], 
        $data['DamageReason'], 
        $DamageDetailID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Damage detail updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating damage detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete a damage
function delete_damage($conn, $DamageID) {
    $sql = "DELETE FROM sndDamageMaster WHERE DamageID = ?";
    $params = [$DamageID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Damage deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting damage: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete a damage detail
function delete_damage_detail($conn, $DamageDetailID) {
    $sql = "DELETE FROM sndDamageDetails WHERE DamageDetailID = ?";
    $params = [$DamageDetailID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Damage detail deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting damage detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to get all receipts
function get_moneyreceipts($conn) {
    $sql = "select MRID,MRNo, PartyID,convert(char(11),MRDate,120) as MRDate, AmountReceived,InWord,PaymentMethodID,(select PMName from sndPaymentMethod where sndPaymentMethod.PaymentMethodID = sndMoneyReceipt.PaymentMethodID) as  PaymentMethod, ReceivedByUserID,convert(char(11),CreatedAt,120) as CreatedAt,convert(char(11),ModifiedAt,120) as ModifiedAt from sndMoneyReceipt";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipts: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipts = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $receipts[] = $row;
    }

    echo json_encode($receipts);
}

function get_PaymentMethod($conn) {
    $sql = "select * from sndPaymentMethod";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipts: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipts = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $receipts[] = $row;
    }

    echo json_encode($receipts);
}

// Function to get a single receipt by ID
function get_moneyreceipt($conn, $MRID) {
    $sql = "select MRID,MRNo, PartyID,convert(char(11),MRDate,120) as MRDate, AmountReceived,InWord,PaymentMethodID,(select PMName from sndPaymentMethod where sndPaymentMethod.PaymentMethodID = sndMoneyReceipt.PaymentMethodID) as  PaymentMethod, ReceivedByUserID,convert(char(11),CreatedAt,120) as CreatedAt,convert(char(11),ModifiedAt,120) as ModifiedAt from sndMoneyReceipt WHERE MRID = ?";
    $params = [$MRID];
	
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($receipt) {
        echo json_encode($receipt);
    } else {
        echo json_encode(["error" => "Receipt not found"]);
    }
}

// Function to create a receipt
function create_moneyreceipt($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndMoneyReceipt ([MRNo]
           ,[PartyID]
           ,[MRDate]
           ,[AmountReceived]
           ,[InWord]
           ,[PaymentMethodID]
           ,[ReceivedByUserID]
           ,[CreatedAt])
            VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE())";
    $params = [
        $data['MRNo'], 
        $data['PartyID'], 
        $data['MRDate'], 
        $data['AmountReceived'], 
		$data['InWord'], 
        $data['PaymentMethodID'], 
        $data['ReceivedByUserID']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Receipt created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating receipt: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a receipt
function update_moneyreceipt($conn, $MRID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndMoneyReceipt 
            SET PartyID = ?, MRDate = ?, AmountReceived = ?, InWord = ?, PaymentMethodID = ?, ReceivedByUserID = ?, ModifiedAt = GETDATE() 
            WHERE MRID = ?";
    $params = [ 
        $data['PartyID'], 
        $data['MRDate'], 
        $data['AmountReceived'], 
		$data['InWord'], 
        $data['PaymentMethodID'], 
        $data['ReceivedByUserID'],
        $MRID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Receipt updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating receipt: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete a receipt
function delete_receipt($conn, $ReceiptID) {
    $sql = "DELETE FROM sndMoneyReceipt WHERE ReceiptID = ?";
    $params = [$ReceiptID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Receipt deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting receipt: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to get all sales orders
function get_salesorders($conn) {
    $sql = "SELECT SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName,
CASE 
        WHEN (SELECT COUNT(*) 
              FROM sndSalesOrderDetails 
              WHERE sndSalesOrderDetails.SalesOrderID = sndSalesOrders.SalesOrderID) = 0 
        THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 1 and Status =1
  order by SalesOrderID desc";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}

// Function to get all sales orders with approval status
function get_salesordersApproval($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 1 and Status =1 or  Status =2
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the results
    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}



// Function to get all sales orders with approval status
function get_salesordersCompleteRejectCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 1 and  Status =3 or  Status =4 or  Status =5
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the results
    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}

// Function to get all sales orders with approval status
function get_salesordersSpecemenApproval($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT SalesOrderID
      ,SalesOrderNo
	  ,convert(char(11),OrderDate,120) as OrderDate, SpecimenUserID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
	  ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SpecimenUserName
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 2 and Status =1 or  Status =2
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the results
    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}



function get_salesordersSpecemanCompleteRejectCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT SalesOrderID
      ,SalesOrderNo
	   ,convert(char(11),OrderDate,120) as OrderDate, SpecimenUserID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
	  ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SpecimenUserName
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 2 and  Status =3 or  Status =4 or  Status =5
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the results
    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}

// Function to get all sales orders with approval status
function get_salesordersChallan($conn) {
       // SQL query with proper parameter placeholders
    $sql = "
        SELECT SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as StatusName
	  ,AppStatus
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatusName
      ,TotalAmount
	  ,challanstatus
	  ,(select Statusmeans from sndStatus where status = sndSalesOrders.challanstatus and statustables = 'sndSalesChallan') as challanstatusName
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 1 and  Status =3 and challanstatus =0
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
  //  $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the results
    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}




function get_salesorderssingle($conn,$SalesOrderID) {
	if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }	
	
    $sql = "SELECT SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate
	  ,PartyID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,TotalAmount
      ,UserID
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 1 and SalesOrderID = ?";
  
    $paramsOrder = [$SalesOrderID];
    $stmt = sqlsrv_query($conn, $sql, $paramsOrder);
  
   // $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}

function get_specimenorderssingle($conn,$SalesOrderID) {
	if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }	
	
    $sql = "SELECT SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate
	  ,SpecimenUserID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,TotalAmount
      ,UserID
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 2 and SalesOrderID = ?";
  
    $paramsOrder = [$SalesOrderID];
    $stmt = sqlsrv_query($conn, $sql, $paramsOrder);
  
   // $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}

function update_salesorderssingle($conn, $SalesOrderID) {
    // Validate SalesOrderID
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields in the input
    if (
        empty($input['OrderDate'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Prepare SQL query to update the sales order
    $sql = "UPDATE sndSalesOrders
            SET OrderDate = ?, 
                
                PartyID = ?, 
                SpecimenUserID = ?, 
               
                UserID = ?, 
                ModifiedAt = GETDATE()
            WHERE SalesOrderID = ?";

    // Prepare parameters for the query
    $params = [
        $input['OrderDate'],
       
        $input['PartyID'] ?? null,
        $input['SpecimenUserID'] ?? null,
       
        $input['UserID'] ?? null,
        $SalesOrderID
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error updating sales order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success response
    echo json_encode(["success" => "Sales order updated successfully", "SalesOrderID" => $SalesOrderID]);
}

function cancel_salesorder($conn, $SalesOrderID) {
    // Validate SalesOrderID
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields in the input
    if (empty($input['Remarks'])) { // Remarks field is mandatory for cancellation
        echo json_encode(["error" => "Remarks are required"]);
        return;
    }

    // Prepare SQL query to update the sales order
    $sql = "UPDATE sndSalesOrders
            SET 
                Status = 0,  -- Assuming '0' means canceled
                Remarks = ?, 
                ModifiedAt = GETDATE()
            WHERE SalesOrderID = ?";

    // Prepare parameters for the query
    $params = [
        $input['Remarks'], // Use the Remarks from the input
        $SalesOrderID      // Bind the SalesOrderID for the WHERE condition
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error canceling sales order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success response
    echo json_encode(["success" => "Sales order canceled successfully", "SalesOrderID" => $SalesOrderID]);
}


function update_SalesOrders($conn, $SalesOrderID) {
    // Validate SalesOrderID
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields in the input
    if (
       
        empty($input['OrderDate'])
       
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Update the main sales order
    $sql = "UPDATE sndSalesOrders
            SET 
                OrderDate = ?, 
                PartyID = ?, 
                SpecimenUserID = ?, 
                
                UserID = ?, 
                ModifiedAt = GETDATE()
            WHERE SalesOrderID = ?";

    $params = [
        
        $input['OrderDate'],
        $input['PartyID'] ?? null,
        $input['SpecimenUserID'] ?? null,
       
        $input['UserID'] ?? null,
        $SalesOrderID
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors for the main order
    if ($stmt === false) {
        echo json_encode(["error" => "Error updating sales order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Check if there are order details to update
    if (isset($input['orderDetails']) && is_array($input['orderDetails'])) {
        foreach ($input['orderDetails'] as $detail) {
            // Validate required fields for order details
            if (!isset($detail['SalesOrderDetailID'])) {
                echo json_encode(["error" => "SalesOrderDetailID is required for updating order details"]);
                return;
            }

            // Update existing order details
            $sqlDetail = "UPDATE sndSalesOrderDetails
                          SET FinancialYearID = ?, 
                              ProductCategoryID = ?, 
                              ProductID = ?, 
                              Quantity = ?, 
                              Price = ?, 
                              ModifiedAt = GETDATE()
                          WHERE SalesOrderDetailID = ? AND SalesOrderID = ?";

            $paramsDetail = [
                $detail['FinancialYearID'] ?? null,
                $detail['ProductCategoryID'] ?? null,
                $detail['ProductID'] ?? null,
                $detail['Quantity'] ?? null,
                $detail['Price'] ?? null,
                $detail['SalesOrderDetailID'],
                $SalesOrderID
            ];

            $stmtDetail = sqlsrv_query($conn, $sqlDetail, $paramsDetail);

            // Handle SQL execution errors for order details
            if ($stmtDetail === false) {
                echo json_encode(["error" => "Error updating order detail: " . print_r(sqlsrv_errors(), true)]);
                return;
            }
        }
    }

    // Update TotalAmount for the sales order based on order details
    $updateTotalAmountSql = "UPDATE sndSalesOrders
                             SET TotalAmount = (
                                 SELECT SUM(Quantity * Price)
                                 FROM sndSalesOrderDetails
                                 WHERE SalesOrderID = sndSalesOrders.SalesOrderID
                             )
                             WHERE SalesOrderID = ?";
    $updateTotalAmountParams = [$SalesOrderID];
    $stmtTotalAmount = sqlsrv_query($conn, $updateTotalAmountSql, $updateTotalAmountParams);

    // Handle errors in TotalAmount update
    if ($stmtTotalAmount === false) {
        echo json_encode(["error" => "Error updating TotalAmount: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success response
    echo json_encode(["success" => "Sales order and details updated successfully", "SalesOrderID" => $SalesOrderID]);
}


// Function to get all sales orders
function get_specimenorders($conn) {
    $sql = "SELECT 
    SalesOrderID,
    SalesOrderNo,
    CONVERT(CHAR(11), OrderDate, 120) AS OrderDate,
    (SELECT EmpName 
     FROM sndUsers 
     WHERE UserID = SpecimenUserID) AS UserName,
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE Status = sndSalesOrders.Status AND StatusTables = 'sndSalesOrders') AS Status,
    (SELECT DISTINCT AppStatusMeans 
     FROM sndApprovals 
     WHERE AppStatus = sndSalesOrders.AppStatus AND ApprovalTables = 'sndSalesOrders') AS AppStatus,
    TotalAmount,
    (SELECT EmpName 
     FROM sndUsers 
     WHERE UserID = sndSalesOrders.UserID) AS LogUserName,
    CASE 
        WHEN (SELECT COUNT(*) 
              FROM sndSalesOrderDetails 
              WHERE sndSalesOrderDetails.SalesOrderID = sndSalesOrders.SalesOrderID) = 0 THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus
FROM 
    [dbo].[sndSalesOrders]
WHERE 
    OrderTypeID = 2 
    AND ChallanStatus = 0
ORDER BY 
    SalesOrderID DESC";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orders[] = $row;
    }

    echo json_encode($orders);
}

function get_salesorderdetails($conn, $SalesOrderID) {
    // Validate SalesOrderID
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    // SQL query to fetch order details
    $sql = "SELECT ROW_NUMBER() OVER (ORDER BY SalesOrderDetailID) AS SL,
				   SalesOrderDetailID,
                   SalesOrderID,
                   FinancialYearID,
                   ProductCategoryID,
                   ProductID,
                   Quantity,
                   Price,
                   Quantity*Price as SubTotal,
				   CONCAT(Quantity,' Pcs', ' @ Tk. ', Price, ' = ', Quantity*Price) AS RateValue -- Corrected calculation
            FROM sndSalesOrderDetails
            WHERE SalesOrderID = ?";
    
    // Execute the query with parameterized input
	// CONCAT('Qty:', Quantity, '* Rate:', Price, ' =', Quantity*Price) AS RateValue -- Corrected calculation
    $params = [$SalesOrderID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching order details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch data into an array
    $orderDetails = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orderDetails[] = $row;
    }

    // Return the fetched data
    echo json_encode([
        "SalesOrderID" => $SalesOrderID,
        "orderDetails" => $orderDetails
    ]);
}

function get_salesorderdetailssingle($conn, $SalesOrderDetailID) {
    // Validate SalesOrderID
    if (empty($SalesOrderDetailID)) {
        echo json_encode(["error" => "SalesOrderDetailID is required"]);
        return;
    }

    // SQL query to fetch order details
    $sql = "SELECT SalesOrderDetailID,
                   SalesOrderID,
                   FinancialYearID,
                   ProductCategoryID,
                   ProductID,
                   Quantity,
                   Price,
                   Quantity*Price as SubTotal
            FROM sndSalesOrderDetails
            WHERE SalesOrderDetailID = ?";
    
    // Execute the query with parameterized input
    $params = [$SalesOrderDetailID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching order details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch data into an array
    $orderDetails = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $orderDetails[] = $row;
    }

    // Return the fetched data
    echo json_encode([
        "SalesOrderDetailID" => $SalesOrderDetailID,
        "orderDetails" => $orderDetails
    ]);
}

function delete_SalesOrderDetails($conn, $SalesOrderDetailID) {
    // Validate SalesOrderDetailID
    if (empty($SalesOrderDetailID)) {
        echo json_encode(["error" => "SalesOrderDetailID is required"]);
        return;
    }

    // SQL query to delete the order detail
    $sql = "DELETE FROM sndSalesOrderDetails WHERE SalesOrderDetailID = ?";
    
    // Execute the query with parameterized input
    $params = [$SalesOrderDetailID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting order detail: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Check if any row was affected
    if (sqlsrv_rows_affected($stmt) === 0) {
        echo json_encode(["error" => "No record found with the given SalesOrderDetailID"]);
        return;
    }

    // Return success message
    echo json_encode([
        "message" => "Order detail deleted successfully",
        "SalesOrderDetailID" => $SalesOrderDetailID
    ]);
}


// Function to get a single sales order by ID
function get_order($conn, $SalesOrderID) {
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    // Query to fetch the main sales order record
    $sqlOrder = "SELECT 
                    SalesOrderID,
                    SalesOrderNo,
                    CONVERT(CHAR(11), OrderDate, 120) AS OrderDate,
                    OrderTypeID,
                    PartyID,
                    (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndSalesOrders.PartyID) AS PartyName,
                    SpecimenUserID,
					(SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndSalesOrders.SpecimenUserID) AS SpecimenUserName,
                    (SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndSalesOrders.UserID) AS UserName,
                    TotalAmount,
                    UserID,
					
                    (SELECT StatusMeans FROM sndStatus 
                     WHERE Status = sndSalesOrders.Status 
                       AND StatusTables = 'sndSalesOrders') AS Status,
                    (SELECT distinct AppStatusMeans FROM sndApprovals 
                     WHERE AppStatus = sndSalesOrders.AppStatus 
                       AND ApprovalTables = 'sndSalesOrders') AS AppStatus,
                    NotificationStatus
                 FROM sndSalesOrders
                 WHERE SalesOrderID = ?";
    
    $paramsOrder = [$SalesOrderID];
    $stmtOrder = sqlsrv_query($conn, $sqlOrder, $paramsOrder);

    if ($stmtOrder === false) {
        echo json_encode(["error" => "Error fetching order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $order = sqlsrv_fetch_array($stmtOrder, SQLSRV_FETCH_ASSOC);

    if (!$order) {
        echo json_encode(["error" => "No order found with SalesOrderID: $SalesOrderID"]);
        return;
    }

    // Query to fetch order details for the given SalesOrderID
    $sqlDetails = "SELECT 
					    ROW_NUMBER() OVER (ORDER BY SalesOrderDetailID) AS SL,	
                       SalesOrderDetailID,
                       FinancialYearID,
                       ProductCategoryID,
                       (SELECT CategoryName FROM sndCategorydata WHERE ID = sndSalesOrderDetails.ProductCategoryID) AS CategoryName,
                       ProductID,
                       (SELECT ProductName FROM sndProducts WHERE ProductID = sndSalesOrderDetails.ProductID) AS ProductName,
                       Quantity,
                       Price,
					   CONCAT(Quantity,' Pcs', ' @ Tk. ', Price, ' = ', Quantity*Price) AS RateValue
                   FROM sndSalesOrderDetails
                   WHERE SalesOrderID = ?";
    
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsOrder);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching order details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orderDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $orderDetails[] = $row;
    }

    // Combine the order and details into a single response
    $response = [
        "order" => $order,
        "orderDetails" => $orderDetails
    ];

    echo json_encode($response);
}

function get_orderforchallan($conn, $SalesOrderID) {
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    // Query to fetch the main sales order record
    $sqlOrder = "SELECT 
                    SalesOrderID,
                    SalesOrderNo,
                    CONVERT(CHAR(11), OrderDate, 120) AS OrderDate,
                    OrderTypeID,
                    PartyID,
                    (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndSalesOrders.PartyID) AS PartyName,
                    SpecimenUserID,
					(SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndSalesOrders.SpecimenUserID) AS SpecimenUserName,
                    (SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndSalesOrders.UserID) AS UserName,
                    TotalAmount,
                    UserID,
					
                    (SELECT StatusMeans FROM sndStatus 
                     WHERE Status = sndSalesOrders.Status 
                       AND StatusTables = 'sndSalesOrders') AS Status,
                    (SELECT distinct AppStatusMeans FROM sndApprovals 
                     WHERE AppStatus = sndSalesOrders.AppStatus 
                       AND ApprovalTables = 'sndSalesOrders') AS AppStatus,
                    NotificationStatus
                 FROM sndSalesOrders
                 WHERE SalesOrderID = ?";
    
    $paramsOrder = [$SalesOrderID];
    $stmtOrder = sqlsrv_query($conn, $sqlOrder, $paramsOrder);

    if ($stmtOrder === false) {
        echo json_encode(["error" => "Error fetching order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $order = sqlsrv_fetch_array($stmtOrder, SQLSRV_FETCH_ASSOC);

    if (!$order) {
        echo json_encode(["error" => "No order found with SalesOrderID: $SalesOrderID"]);
        return;
    }

    // Query to fetch order details for the given SalesOrderID
    $sqlDetails = "SELECT 
					    ROW_NUMBER() OVER (ORDER BY SalesOrderDetailID) AS SL,	
                       SalesOrderDetailID,
                       FinancialYearID,
                       ProductCategoryID,
                       (SELECT CategoryName FROM sndCategorydata WHERE ID = sndSalesOrderDetails.ProductCategoryID) AS CategoryName,
                       ProductID,
                       (SELECT ProductName FROM sndProducts WHERE ProductID = sndSalesOrderDetails.ProductID) AS ProductName,
                       Quantity,
                       Price,
					   CONCAT(Quantity,' Pcs', ' @ Tk. ', Price, ' = ', Quantity*Price) AS RateValue,
					   0 as VailableQty
                   FROM sndSalesOrderDetails
                   WHERE SalesOrderID = ?";
    
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsOrder);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching order details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orderDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $orderDetails[] = $row;
    }

    // Combine the order and details into a single response
    $response = [
        "order" => $order,
        "orderDetails" => $orderDetails
    ];

    echo json_encode($response);
}



function create_order($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Determine OrderTypeID based on PartyID and SpecimenUserID
    if (!empty($data['PartyID']) && empty($data['SpecimenUserID'])) {
        $data['OrderTypeID'] = 1; // PartyID is provided, SpecimenUserID is null
    } elseif (!empty($data['SpecimenUserID']) && empty($data['PartyID'])) {
        $data['OrderTypeID'] = 2; // SpecimenUserID is provided, PartyID is null
    } else {
        echo json_encode(["error" => "Invalid data: Either PartyID or SpecimenUserID must be provided, not both."]);
        return;
    }
	
    // Insert into sndSalesOrders
    $sqlOrder = "INSERT INTO sndSalesOrders (
                    SalesOrderNo, OrderDate, OrderTypeID, PartyID, SpecimenUserID,
                    TotalAmount, UserID, CreatedAt, ModifiedAt
                ) 
				OUTPUT INSERTED.SalesOrderID
                VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";
           

    $paramsOrder = [
        $data['SalesOrderNo'],
        $data['OrderDate'],
        $data['OrderTypeID'],
        $data['PartyID'],
        $data['SpecimenUserID'],
        $data['TotalAmount'],
        $data['UserID']
    ];

    $stmtOrder = sqlsrv_query($conn, $sqlOrder, $paramsOrder);

    if ($stmtOrder === false) {
        echo json_encode(["error" => "Error creating order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the inserted SalesOrderID
    $row = sqlsrv_fetch_array($stmtOrder, SQLSRV_FETCH_ASSOC);
    $SalesOrderID = $row['SalesOrderID'] ?? null;

    if (is_null($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is null. Check if the insert was successful."]);
        return;
    }

    // Insert into sndSalesOrderDetails
    foreach ($data['orderDetails'] as $detail) {
        $sqlDetail = "INSERT INTO sndSalesOrderDetails (
                        SalesOrderID, FinancialYearID, ProductCategoryID,
                        ProductID, Quantity, Price, CreatedAt, ModifiedAt
                    ) 
                    VALUES (?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";

        $paramsDetail = [
            $SalesOrderID,
            $detail['FinancialYearID'],
            $detail['ProductCategoryID'],
            $detail['ProductID'],
            $detail['Quantity'],
            $detail['Price']
        ];

        $stmtDetail = sqlsrv_query($conn, $sqlDetail, $paramsDetail);

        if ($stmtDetail === false) {
            echo json_encode(["error" => "Error creating order detail: " . print_r(sqlsrv_errors(), true)]);
            return;
        }
    }

    echo json_encode(["success" => "Order created successfully", "SalesOrderID" => $SalesOrderID]);
}

		
function create_order_master($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Determine OrderTypeID based on PartyID and SpecimenUserID
    if (!empty($data['PartyID']) && empty($data['SpecimenUserID'])) {
        $data['OrderTypeID'] = 1; // PartyID is provided, SpecimenUserID is null
    } elseif (!empty($data['SpecimenUserID']) && empty($data['PartyID'])) {
        $data['OrderTypeID'] = 2; // SpecimenUserID is provided, PartyID is null
    } else {
        echo json_encode(["error" => "Invalid data: Either PartyID or SpecimenUserID must be provided, not both."]);
        return;
    }
	
    // Insert into sndSalesOrders
    $sqlOrder = "INSERT INTO sndSalesOrders (
                    SalesOrderNo, OrderDate, OrderTypeID, PartyID, SpecimenUserID,
                    TotalAmount, UserID, CreatedAt, ModifiedAt
                ) 
				OUTPUT INSERTED.SalesOrderID
                VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";
           

    $paramsOrder = [
        $data['SalesOrderNo'],
        $data['OrderDate'],
        $data['OrderTypeID'],
        $data['PartyID'],
        $data['SpecimenUserID'],
        $data['TotalAmount'],
        $data['UserID']
    ];

    $stmtOrder = sqlsrv_query($conn, $sqlOrder, $paramsOrder);

    if ($stmtOrder === false) {
        echo json_encode(["error" => "Error creating order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }
    // Fetch the inserted SalesOrderID
    $row = sqlsrv_fetch_array($stmtOrder, SQLSRV_FETCH_ASSOC);
    $SalesOrderID = $row['SalesOrderID'] ?? null;

    if (is_null($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is null. Check if the insert was successful."]);
        return;
    }
 echo json_encode(["success" => "Order created successfully", "SalesOrderID" => $SalesOrderID]);
}

function create_sndApprovalDetails($conn) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['SalesOrderID']) ||         // SalesOrderID is mandatory
    empty($input['DemandInfo']) ||           // DemandInfo is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$SalesOrderID = $input['SalesOrderID'];
$DemandInfo = $input['DemandInfo'];
$ReturnInfo = $input['ReturnInfo'] ?? null; // Allow null for ReturnInfo
$AuthComments = $input['AuthComments'] ?? null; // Allow null for AuthComments
$AppComments = $input['AppComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndSalesOrders WHERE SalesOrderID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$SalesOrderID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "SalesOrder not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndSalesOrders',
            'ApprovalTypeID' => $SalesOrderID,
            'DemandInfo' => $DemandInfo,
            'ReturnInfo' => $ReturnInfo,
            'AuthComments' => $AuthComments,
            'AppComments' => $AppComments,
            'CanclledComments' => '', // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

        // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {
            // Authorization stage
            $approvalData['AppStatus'] = 1;
            $newAppStatus = 2;
            $newStatus = 2;
        } elseif ($currentAppStatus == 2) {
            // Approval stage
            $approvalData['AppStatus'] = 2;
            $newAppStatus = 3;
            $newStatus = 3;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for SalesOrderID $SalesOrderID"]);
            return;
        }

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, DemandInfo,
                ReturnInfo, AuthComments, AppComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $approvalData['AppStatus'],
            $approvalData['ApprovalDate'],
            $approvalData['DemandInfo'],
            $approvalData['ReturnInfo'],
            $approvalData['AuthComments'],
            $approvalData['AppComments'],
            $approvalData['CanclledComments'],
            $approvalData['ApprovalDetailsByID'],
            $approvalData['UserID'],
            $approvalData['CreatedAt']
        ];

        $stmtOrder = sqlsrv_query($conn, $sqlInsertApprovalDetails, $paramsOrder);

        if ($stmtOrder === false) {
            echo json_encode(["error" => "Error creating order.", "details" => sqlsrv_errors()]);
            return;
        }

        // Step 5: Update sndSalesOrders
        $sqlUpdateSalesOrder = "UPDATE sndSalesOrders SET Status = ?, AppStatus = ? WHERE SalesOrderID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $SalesOrderID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update sales order.", "details" => sqlsrv_errors()]);
            return;
        }

        echo json_encode(["success" => true, "message" => "Approval details created and sales order updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function create_sndApprovalRejected_Cancelled($conn) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['SalesOrderID']) ||         // SalesOrderID is mandatory
    empty($input['DemandInfo']) ||           // DemandInfo is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$SalesOrderID = $input['SalesOrderID'];
$DemandInfo = $input['DemandInfo'];
$ReturnInfo = $input['ReturnInfo'] ?? null; // Allow null for ReturnInfo
$AuthComments = $input['AuthComments'] ?? null; // Allow null for AuthComments
$AppComments = $input['AppComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndSalesOrders WHERE SalesOrderID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$SalesOrderID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "SalesOrder not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndSalesOrders',
            'ApprovalTypeID' => $SalesOrderID,
            'DemandInfo' => $DemandInfo,
            'ReturnInfo' => $ReturnInfo,
            'AuthComments' => $AuthComments,
            'AppComments' => $AppComments,
            'CanclledComments' => $AuthComments, // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

         // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {        
            $approvalData['AppStatus'] = 1;
            $approvalData['AuthComments'] = $AuthComments;
            $newAppStatus = 5;    //Cancelled
            $newStatus = 5;
        } elseif ($currentAppStatus == 2) {
            $approvalData['AppStatus'] = 2;
            $approvalData['ReturnInfo'] = $ReturnInfo;
            $approvalData['AppComments'] = $AppComments;
            $newAppStatus = 4;      // Rejected
            $newStatus = 4;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for SalesOrderID $SalesOrderID"]);
            return;
        }
        

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, DemandInfo,
                ReturnInfo, AuthComments, AppComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $approvalData['AppStatus'],
            $approvalData['ApprovalDate'],
            $approvalData['DemandInfo'],
            $approvalData['ReturnInfo'],
            $approvalData['AuthComments'],
            $approvalData['AppComments'],
            $approvalData['CanclledComments'],
            $approvalData['ApprovalDetailsByID'],
            $approvalData['UserID'],
            $approvalData['CreatedAt']
        ];

        $stmtOrder = sqlsrv_query($conn, $sqlInsertApprovalDetails, $paramsOrder);

        if ($stmtOrder === false) {
            echo json_encode(["error" => "Error creating order.", "details" => sqlsrv_errors()]);
            return;
        }

        // Step 5: Update sndSalesOrders
        $sqlUpdateSalesOrder = "UPDATE sndSalesOrders SET Status = ?, AppStatus = ? WHERE SalesOrderID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $SalesOrderID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update sales order.", "details" => sqlsrv_errors()]);
            return;
        }

        echo json_encode(["success" => true, "message" => "Approval details created and sales order updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}




function create_order_details($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        empty($input['SalesOrderID']) ||
        empty($input['FinancialYearID']) ||
        empty($input['ProductCategoryID']) ||
        empty($input['ProductID']) ||
        !isset($input['Quantity']) || // Check existence as Quantity can be 0
        !isset($input['Price'])       // Check existence as Price can be 0
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert the order detail into sndSalesOrderDetails
    $insertDetailSQL = "INSERT INTO sndSalesOrderDetails (
                            SalesOrderID, FinancialYearID, ProductCategoryID,
                            ProductID, Quantity, Price, CreatedAt, ModifiedAt
                        ) 
                        VALUES (?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";

    $paramsDetail = [
        $input['SalesOrderID'],
        $input['FinancialYearID'],
        $input['ProductCategoryID'],
        $input['ProductID'],
        $input['Quantity'],
        $input['Price']
    ];

    $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);

    if ($stmtDetail === false) {
        echo json_encode(["error" => "Error inserting order detail: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Update the total amount in sndSalesOrders
    $updateTotalSQL = "UPDATE sndSalesOrders
                       SET TotalAmount = (
                           SELECT SUM(Quantity * Price) AS subtotal
                           FROM sndSalesOrderDetails
                           WHERE sndSalesOrderDetails.SalesOrderID = sndSalesOrders.SalesOrderID
                       )
                       WHERE sndSalesOrders.SalesOrderID = ?";
    $paramsUpdateTotal = [$input['SalesOrderID']];

    $stmtUpdateTotal = sqlsrv_query($conn, $updateTotalSQL, $paramsUpdateTotal);

    if ($stmtUpdateTotal === false) {
        echo json_encode(["error" => "Error updating total amount: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success message
    echo json_encode([
        "message" => "Order detail created and total amount updated successfully",
        "SalesOrderID" => $input['SalesOrderID']
    ]);
}

function create_ppreceiptdetails($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        empty($input['ProductReceiptID']) ||
        empty($input['FinancialYearID']) ||
        empty($input['ProductCategoryID']) ||
        empty($input['ProductID']) ||
        !isset($input['Quantity']) || // Check existence as Quantity can be 0
        !isset($input['Rate'])   ||    // Check existence as Price can be 0
		!isset($input['Total'])       // Check existence as Price can be 0
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert the order detail into sndSalesOrderDetails
    $insertDetailSQL = "INSERT INTO sndProductReceiptDetails (
                            ProductReceiptID, FinancialYearID, ProductCategoryID,
                            ProductID, Quantity, Rate, Total
                        ) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $paramsDetail = [
        $input['ProductReceiptID'],
        $input['FinancialYearID'],
        $input['ProductCategoryID'],
        $input['ProductID'],
        $input['Quantity'],
        $input['Rate'],
		$input['Total']
    ];

    $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);

    if ($stmtDetail === false) {
        echo json_encode(["error" => "Error inserting order detail: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Update the total amount in sndProductReceipt
    $updateTotalSQL = "UPDATE sndProductReceipt
                       SET TotalAmount = (
                           SELECT SUM(Quantity * Rate) AS subtotal
                           FROM sndProductReceiptDetails
                           WHERE sndProductReceiptDetails.ProductReceiptID = sndProductReceipt.ProductReceiptID
                       )
                       WHERE sndProductReceipt.ProductReceiptID = ?";
    $paramsUpdateTotal = [$input['ProductReceiptID']];

    $stmtUpdateTotal = sqlsrv_query($conn, $updateTotalSQL, $paramsUpdateTotal);

    if ($stmtUpdateTotal === false) {
        echo json_encode(["error" => "Error updating total amount: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success message
    echo json_encode([
        "message" => "Product Receipt detail created and total amount updated successfully",
        "ProductReceiptID" => $input['ProductReceiptID']
    ]);
}


// Function to update a sales order
function update_order($conn, $SalesOrderID) {
    if (empty($SalesOrderID)) {
        echo json_encode(["error" => "SalesOrderID is required"]);
        return;
    }

    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields for main order update
    if (!isset($input['SalesOrderNo'], $input['OrderDate'], $input['TotalAmount'])) {
        echo json_encode(["error" => "Missing required fields for Sales Order"]);
        return;
    }

    // Update the main sales order
    $sqlOrder = "UPDATE sndSalesOrders
                 SET SalesOrderNo = ?,
                     OrderDate = ?,
                     OrderTypeID = ?,
                     PartyID = ?,
                     SpecimenUserID = ?,
                     TotalAmount = ?,
                     UserID = ?,
                     ModifiedAt = GETDATE()
                 WHERE SalesOrderID = ?";
                 
    $paramsOrder = [
        $input['SalesOrderNo'],
        $input['OrderDate'],
        $input['OrderTypeID'] ?? null,
        $input['PartyID'] ?? null,
        $input['SpecimenUserID'] ?? null,
        $input['TotalAmount'],
        $input['UserID'] ?? null,
        $SalesOrderID
    ];

    $stmtOrder = sqlsrv_query($conn, $sqlOrder, $paramsOrder);
    if ($stmtOrder === false) {
        echo json_encode(["error" => "Error updating order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Update order details if provided
    if (isset($input['orderDetails']) && is_array($input['orderDetails'])) {
        foreach ($input['orderDetails'] as $detail) {
            // Validate required fields for each detail
            if (!isset($detail['SalesOrderDetailID'])) {
                echo json_encode(["error" => "SalesOrderDetailID is required for updating order details"]);
                return;
            }

            $sqlDetail = "UPDATE sndSalesOrderDetails
                          SET FinancialYearID = ?,
                              ProductCategoryID = ?,
                              ProductID = ?,
                              Quantity = ?,
                              Price = ?,
                              ModifiedAt = GETDATE()
                          WHERE SalesOrderDetailID = ? AND SalesOrderID = ?";
                          
            $paramsDetail = [
                $detail['FinancialYearID'] ?? null,
                $detail['ProductCategoryID'] ?? null,
                $detail['ProductID'] ?? null,
                $detail['Quantity'] ?? null,
                $detail['Price'] ?? null,
                $detail['SalesOrderDetailID'],
                $SalesOrderID
            ];

            $stmtDetail = sqlsrv_query($conn, $sqlDetail, $paramsDetail);
            if ($stmtDetail === false) {
                echo json_encode(["error" => "Error updating order detail: " . print_r(sqlsrv_errors(), true)]);
                return;
            }
        }
    }

    echo json_encode(["success" => "Order updated successfully"]);
}

// Function to delete a sales order
function delete_order($conn, $SalesOrderID) {
    // First, delete the order details
    $sqlDetail = "DELETE FROM sndSalesOrderDetails WHERE SalesOrderID = ?";
    $paramsDetail = [$SalesOrderID];
    sqlsrv_query($conn, $sqlDetail, $paramsDetail);

    // Then, delete the order
    $sqlOrder = "DELETE FROM sndSalesOrders WHERE SalesOrderID = ?";
    $paramsOrder = [$SalesOrderID];
    $stmtOrder = sqlsrv_query($conn, $sqlOrder, $paramsOrder);

    if ($stmtOrder) {
        echo json_encode(["success" => "Order deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting order: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to get all visit plans
function get_all_visit_plans($conn) {
    $sql = "SELECT * FROM sndVisitPlans";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visit plans: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitPlans = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $visitPlans[] = $row;
    }

    echo json_encode($visitPlans);
}


// Function to get a single visit plan by ID
function get_visit_plan($conn, $VisitPlanID) {
    $sql = "SELECT * FROM sndVisitPlans WHERE VisitPlanID = ?";
    $params = [$VisitPlanID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitPlan = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($visitPlan) {
        echo json_encode($visitPlan);
    } else {
        echo json_encode(["error" => "Visit plan not found"]);
    }
}

// Function to get all visit plans
function get_all_visit_entries($conn) {
    $sql = "SELECT * FROM sndVisitPlans where ApprovedbyUserID is not null";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visit plans: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitPlans = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $visitPlans[] = $row;
    }

    echo json_encode($visitPlans);
}


// Function to get a single visit plan by ID
function get_visit_entry($conn, $VisitPlanID) {
    $sql = "SELECT * FROM sndVisitPlans WHERE ApprovedbyUserID is not null and VisitPlanID = ?";
    $params = [$VisitPlanID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitPlan = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($visitPlan) {
        echo json_encode($visitPlan);
    } else {
        echo json_encode(["error" => "Visit plan not found"]);
    }
}

// Function to create a new visit plan
function create_visit_plan($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['VisitDate']) || !isset($input['UserID']) || !isset($input['institutionID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

	$sql = "INSERT INTO sndVisitPlans
           (VisitDate
           ,UserID
           ,InstitutionID
           ,PurposeID
           ,Purposes
           ,ApprovalStatus
           ,Status
           ,CreatedAt
           ,ModifiedAt)
       VALUES (?, ?, ?, ?, ?, ?,?, GETDATE(), GETDATE())";
	
       $params = [
        $input['VisitDate'],
        $input['UserID'],
        $input['institutionID'],
        $input['PurposeID'] ?? null,
        $input['Purposes'] ?? null,
		 $input['ApprovalStatus'] ?? null,
        $input['Status'] ?? null
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan created successfully"]);
}

// Function to create a new visit plan
function create_visit_plan_details($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['TeacherName']) || !isset($input['Designation']) || !isset($input['Phone'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

	$sql = "INSERT INTO dbo.sndVisitPlanDetails
           (VisitPlanID
           ,TeacherName
           ,Designation
           ,Phone
           ,Classes
		   ,FinancialYearID
		   ,ProductCategoryID
           ,ProductID
           ,StudentNo
           ,DonationAmount
           ,CreatedAt
           ,ModifiedAt)
	 VALUES (?, ?, ?, ?, ?, ?,?, ?,?,?, GETDATE(), GETDATE())";
	 
	 $params = [
		   $input['VisitPlanID'],
           $input['InstitutionID'],
           $input['Classes'],
           $input['ProductID'],
           $input['StudentNo'],
           $input['DonationAmount'],
           $input['TeacherName'],
           $input['Designation'],
           $input['Phone']
		];
		
      
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan created successfully"]);
}

function create_visit_plan_TADA_details($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['TADACategoryID']) || !isset($input['Amount'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

	$sql = "INSERT INTO dbo.sndVisitPlanTADADetails
           (VisitPlanID
           ,TADACategoryID
           ,Amount
           ,CreatedAt
           ,ModifiedAt)
	 VALUES (?, ?, ?, ?, ?, ?,?, ?,?,?, GETDATE(), GETDATE())";
	 
	 $params = [
		   $input['VisitPlanID'],
           $input['TADACategoryID'],
           $input['Amount']
		];
		
      
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan created successfully"]);
}


// Function to update an existing visit plan
function update_visit_plan($conn, $VisitPlanID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['VisitDate']) || !isset($input['UserID']) || !isset($input['institutionID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndVisitPlans SET 
            VisitDate = ?, 
            UserID = ?, 
            institutionID = ?, 
            PurposeID = ?, 
            Purposes = ?, 
			ApprovalStatus = ?, 
            Status = ?, 
            ModifiedAt = GETDATE() 
            WHERE VisitPlanID = ?";

	$params = [
        $input['VisitDate'],
        $input['UserID'],
        $input['institutionID'],
        $input['PurposeID'] ?? null,
        $input['Purposes'] ?? null,
		 $input['ApprovalStatus'] ?? null,
        $input['Status'] ?? null,
		 $VisitPlanID
    ];
	


    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan updated successfully"]);
}

// Function to update an existing visit plan
function update_visit_plan_approval($conn, $VisitPlanID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['ApprovalStatus']) || !isset($input['ApprovedbyUserID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

		
    $sql = "UPDATE sndVisitPlans SET 
            ApprovalStatus = ?, 
            Comments = ?, 
			ApprovedbyUserID = ?,
			VisitPlanApprovalDate = GETDATE() 
            ";

	$params = [
		 $input['ApprovalStatus'] ?? null,
        $input['Comments'] ?? null,
		 $input['ApprovedbyUserID'] ?? null,
		 $VisitPlanID
    ];
	


    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan updated successfully"]);
}


// Function to update an existing visit plan
function update_visit_plan_entry($conn, $VisitPlanID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CheckInTime']) || !isset($input['CheckOutTime'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

	
    $sql = "UPDATE sndVisitPlans SET 
            CheckInTime = ?, 
            CheckOutTime = ?, 
            Latitude = ?,
			Longitude = ?,
			VisitEntryDate = GETDATE() 
			";

	$params = [
		 $input['CheckInTime'] ?? null,
        $input['CheckOutTime'] ?? null,
		 $input['Latitude'] ?? null,
		 $input['Longitude'] ?? null,
		 $VisitPlanID
    ];
	


    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan updated successfully"]);
}

// Function to update an existing visit plan
function update_visit_plan_entry_check($conn, $VisitPlanID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['VisitEntryApprovalCommentsCheck'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

	
    $sql = "UPDATE sndVisitPlans SET 
            VisitEntryApprovalCommentsCheck = ?, 
			VisitApprovalStatusCheck = 'Checked',
			VisitEntryApprovalDateCheck = GETDATE() 
			";
			

	$params = [
		 $input['VisitEntryApprovalCommentsCheck'] ?? null,
		 $VisitPlanID
    ];
	


    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan updated successfully"]);
}

// Function to update an existing visit plan
function update_visit_plan_entry_approved($conn, $VisitPlanID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['VisitEntryAppCommentsApproved'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

	
    $sql = "UPDATE sndVisitPlans SET 
            VisitEntryAppCommentsApproved = ?, 
			VisitAppStatusApproved = 'Checked',
			VisitEntryAppDateApproved = GETDATE() 
			";
			

	$params = [
		 $input['VisitEntryAppCommentsApproved'] ?? null,
		 $VisitPlanID
    ];
	


    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan updated successfully"]);
}

// Function to delete a visit plan by ID
function delete_visit_plan($conn, $VisitPlanID) {
    $sql = "DELETE FROM sndVisitPlans WHERE VisitPlanID = ?";
    $params = [$VisitPlanID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan deleted successfully"]);
}

// Function to get all institutions
// Function to get all institutions
function get_all_institutions($conn) {
    $baseURL = "https://asianabpolymer.com/abpolymer/"; // Replace with your actual domain or base URL
    $sql = "SELECT 
    InstitutionID, 
    InstitutionTypeID, 
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE sndCategorydata.id = sndInstitutions.InstitutionTypeID 
       AND CategoryType = 'institution-type') AS InstitutionTypeName,
    InstitutionName, 
    TotalStudents, 
    ContactPersonName, 
    Designation, 
    ContactPhone, 
    Address, 
    RegionID, 
	EIINNo,
    InstitutionScanImagePath, 
    status, 
    CreatedAt, 
    ModifiedAt, 
    CASE 
        WHEN (SELECT COUNT(*) 
              FROM sndInstitutionDetails 
              WHERE sndInstitutionDetails.InstitutionID = sndInstitutions.InstitutionID) = 0 
        THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus
FROM 
    sndInstitutions
ORDER BY 
    InstitutionID DESC;
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching institutions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $institutions = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Append the full URL to the image path if it exists
        if (!empty($row['InstitutionScanImagePath'])) {
            $row['InstitutionScanImagePath'] = $baseURL . $row['InstitutionScanImagePath'];
        }
        $institutions[] = $row;
    }

    echo json_encode($institutions);
}


// Function to get a single institution by ID
function get_institution($conn, $institutionID) {
    $sql = "SELECT * FROM sndinstitutions WHERE institutionID = ?";
    $params = [$institutionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $institution = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($institution) {
        // Add full image URL if image path exists
        if (!empty($institution['InstitutionScanImagePath'])) {
            $baseUrl = "https://asianabpolymer.com/abpolymer/"; // Update with your actual base URL
            $institution['InstitutionScanImageURL'] = $baseUrl . $institution['InstitutionScanImagePath'];
        } else {
            $institution['InstitutionScanImageURL'] = null; // No image uploaded
        }

        // Fetch institution details
    $details_sql = " SELECT 
    ROW_NUMBER() OVER (ORDER BY InstitutionDetailsID) AS SL, -- Add row number
    InstitutionDetailsID, 
    InstitutionID, 
    TeacherName, 
    Designation, 
    ContactPhone, 
    sndClassID,
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'books-category' AND sndCategorydata.id = sndClassID) AS ClassName,
    sndSubjectID,
    (SELECT ProductName 
     FROM sndProducts 
     WHERE sndProducts.ProductID = sndSubjectID) AS SubjectName
FROM 
    sndInstitutionDetails
WHERE 
    InstitutionID = ?";
        $details_stmt = sqlsrv_query($conn, $details_sql, $params);
        $details = [];
        while ($detail = sqlsrv_fetch_array($details_stmt, SQLSRV_FETCH_ASSOC)) {
            $details[] = $detail;
        }
        $institution['details'] = $details;

        echo json_encode($institution);
    } else {
        echo json_encode(["error" => "Institution not found"]);
    }
}

function get_institutionDetails($conn, $institutionDetailsID) {
    $sql = "select InstitutionDetailsID, InstitutionID,TeacherName,Designation,ContactPhone,sndClassID,
(select CategoryName from sndCategorydata where CategoryType = 'books-category' and sndCategorydata.id = sndClassID) as ClassName,
sndSubjectID,
(select ProductName from sndProducts where sndProducts.ProductID = sndSubjectID) as SubjectName
 from sndInstitutionDetails WHERE institutionDetailsID = ?";
    $params = [$institutionDetailsID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // Handle query execution error
        echo json_encode(["error" => "Error fetching institutionDetailsID: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the result
    $institutionDetails = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($institutionDetails) {
        // If data is found, return it
        echo json_encode($institutionDetails);
    } else {
        // If no data is found
        echo json_encode(["error" => "institutionDetailsID not found"]);
    }
}


function create_institution($conn) {
    // Validate required fields from $_POST
    if (!isset($_POST['institutionName']) || !isset($_POST['institutionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Initialize variables
    $imagePath = null;

    // Handle file upload (optional)
    if (isset($_FILES['InstitutionScanImage']) && $_FILES['InstitutionScanImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/institution_images/";
        $fileName = uniqid("Institution_", true) . "." . pathinfo($_FILES['InstitutionScanImage']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
                echo json_encode(["error" => "Failed to create directory for image upload"]);
                return;
            }
        }

        // Move the uploaded file to the server directory
        if (!move_uploaded_file($_FILES['InstitutionScanImage']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving institution scan image"]);
            return;
        }

        // Set the relative path to save in the database
        $imagePath = 'uploads/institution_images/' . $fileName;
    }

    // SQL query to insert the institution data
    $sql = "INSERT INTO sndInstitutions (
                InstitutionTypeID, InstitutionName, TotalStudents, ContactPersonName, Designation, 
                ContactPhone, Address, RegionID, EIINNo, InstitutionScanImagePath, CreatedAt, ModifiedAt
            )
            OUTPUT INSERTED.InstitutionID
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?, GETDATE(), GETDATE())";

    // Prepare input data
    $params = [
        $_POST['institutionTypeID'],
        $_POST['institutionName'],
        $_POST['TotalStudents'] ?? null,
        $_POST['ContactPersonName'] ?? null,
        $_POST['Designation'] ?? null,
        $_POST['ContactPhone'] ?? null,
        $_POST['Address'] ?? null,
        $_POST['RegionID'] ?? null,
		$_POST['EIINNo'] ?? null,
        $imagePath
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the inserted InstitutionID
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $InstitutionID = $row['InstitutionID'] ?? null;

    // Check if InstitutionID is valid
    if (is_null($InstitutionID)) {
        echo json_encode(["error" => "InstitutionID is null. Check if the insert was successful."]);
        return;
    }

    // Insert teacher details if provided
    if (isset($_POST['details']) && is_array($_POST['details']) && !empty($_POST['details'])) {
        foreach ($_POST['details'] as $detail) {
            // Skip insertion if all detail fields are null
            if (
                empty($detail['TeacherName']) &&
                empty($detail['Designation']) &&
                empty($detail['ContactPhone']) &&
                empty($detail['sndClassID']) &&
                empty($detail['sndSubjectID'])
            ) {
                continue;
            }

            $detail_sql = "INSERT INTO sndInstitutionDetails (InstitutionID, TeacherName, Designation, ContactPhone, sndClassID, sndSubjectID) 
                           VALUES (?, ?, ?, ?, ?, ?)";
            $detail_params = [
                $InstitutionID,
                $detail['TeacherName'] ?? null,
                $detail['Designation'] ?? null,
                $detail['ContactPhone'] ?? null,
                $detail['sndClassID'] ?? null,
                $detail['sndSubjectID'] ?? null
            ];

            $detail_stmt = sqlsrv_query($conn, $detail_sql, $detail_params);

            // Log errors for details insertion
            if ($detail_stmt === false) {
                error_log("Error inserting institution details: " . print_r(sqlsrv_errors(), true));
            }
        }
    }

    // Return success response
    echo json_encode([
        "message" => "Institution created successfully",
        "InstitutionID" => $InstitutionID,
        "InstitutionScanImagePath" => $imagePath
    ]);


}


function create_institutionAndroid($conn) {
    // Validate required fields from $_POST
    if (!isset($_POST['institutionName']) || !isset($_POST['institutionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Initialize variables
    $imagePath = null;

    // Handle file upload (optional)
    if (isset($_FILES['InstitutionScanImage']) && $_FILES['InstitutionScanImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/institution_images/";
        $fileName = uniqid("Institution_", true) . "." . pathinfo($_FILES['InstitutionScanImage']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
                echo json_encode(["error" => "Failed to create directory for image upload"]);
                return;
            }
        }

        // Move the uploaded file to the server directory
        if (!move_uploaded_file($_FILES['InstitutionScanImage']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving institution scan image"]);
            return;
        }

        // Set the relative path to save in the database
        $imagePath = 'uploads/institution_images/' . $fileName;
    }

    // SQL query to insert the institution data
    $sql = "INSERT INTO sndInstitutions (
                InstitutionTypeID, InstitutionName, TotalStudents, ContactPersonName, Designation, 
                ContactPhone, Address, RegionID, EIINNo, InstitutionScanImagePath, CreatedAt, ModifiedAt
            )
            OUTPUT INSERTED.InstitutionID
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?, GETDATE(), GETDATE())";

    // Prepare input data
    $params = [
        $_POST['institutionTypeID'],
        $_POST['institutionName'],
        $_POST['TotalStudents'] ?? null,
        $_POST['ContactPersonName'] ?? null,
        $_POST['Designation'] ?? null,
        $_POST['ContactPhone'] ?? null,
        $_POST['Address'] ?? null,
        $_POST['RegionID'] ?? null,
		$_POST['EIINNo'] ?? null,
        $imagePath
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the inserted InstitutionID
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $InstitutionID = $row['InstitutionID'] ?? null;

    // Check if InstitutionID is valid
    if (is_null($InstitutionID)) {
        echo json_encode(["error" => "InstitutionID is null. Check if the insert was successful."]);
        return;
    }

    // Return a success message with the new institution ID and image path (if available)
    echo json_encode([
        "message" => "Institution created successfully",
        "InstitutionID" => $InstitutionID,
        "InstitutionScanImagePath" => $imagePath
    ]);


}



function create_institutionDetailsAndroid($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['InstitutionID']) || !isset($input['TeacherName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $InstitutionID = $input['InstitutionID'];

    // Insert teacher details
    $detail_sql = "INSERT INTO sndInstitutionDetails (InstitutionID, TeacherName, Designation, ContactPhone, sndClassID, sndSubjectID) 
                   VALUES (?, ?, ?, ?, ?, ?)";
    $detail_params = [
        $InstitutionID, 
        $input['TeacherName'], 
        $input['Designation'] ?? null, 
        $input['ContactPhone'] ?? null, 
        $input['sndClassID'] ?? null, 
        $input['sndSubjectID'] ?? null
    ];
    
    $stmt = sqlsrv_query($conn, $detail_sql, $detail_params);
    if ($stmt === false) {
        echo json_encode(["error" => "Error inserting institution details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success message
    echo json_encode(["message" => "Institution Details created successfully"]);
}

// Function to update an existing institution
function update_institution($conn, $institutionID) {
    // Initialize variables
    $input = $_POST; // Use $_POST for form-data submissions
    $imagePath = null;

    // Check if the required fields are provided
    if (!isset($input['institutionName']) || !isset($input['institutionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Handle file upload if a new image is provided
    if (isset($_FILES['InstitutionScanImage']) && $_FILES['InstitutionScanImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/institution_images/";
        $fileName = uniqid("Institution_", true) . "." . pathinfo($_FILES['InstitutionScanImage']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
                echo json_encode(["error" => "Failed to create directory for image upload"]);
                return;
            }
        }

        // Move the uploaded file to the server directory
        if (!move_uploaded_file($_FILES['InstitutionScanImage']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving institution scan image"]);
            return;
        }

        // Set the new relative image path
        $imagePath = "uploads/institution_images/" . $fileName;
    } else {
        // If no new image is uploaded, retain the existing image path
        $select_sql = "SELECT InstitutionScanImagePath FROM sndInstitutions WHERE InstitutionID = ?";
        $select_stmt = sqlsrv_query($conn, $select_sql, [$institutionID]);
        $existing = sqlsrv_fetch_array($select_stmt, SQLSRV_FETCH_ASSOC);
        $imagePath = $existing['InstitutionScanImagePath'] ?? null;
    }

    // SQL Update query for updating institution information
    $sql = "UPDATE sndInstitutions SET 
            InstitutionTypeID = ?, 
            InstitutionName = ?, 
            TotalStudents = ?, 
            ContactPersonName = ?, 
            Designation = ?, 
            ContactPhone = ?, 
            Address = ?, 
            RegionID = ?, 
			EIINNo = ?,
            InstitutionScanImagePath = ?, 
            ModifiedAt = GETDATE() 
            WHERE InstitutionID = ?";

    $params = [
        $input['institutionTypeID'], 
        $input['institutionName'], 
        $input['TotalStudents'] ?? null, 
        $input['ContactPersonName'] ?? null, 
        $input['Designation'] ?? null, 
        $input['ContactPhone'] ?? null, 
        $input['Address'] ?? null, 
        $input['RegionID'] ?? null, 
		$input['EIINNo'] ?? null, 
        $imagePath,
        $institutionID
    ];

    // Execute the update query for institution data
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Delete the old institution details from `sndInstitutionDetails` table
    $delete_sql = "DELETE FROM sndInstitutionDetails WHERE InstitutionID = ?";
    sqlsrv_query($conn, $delete_sql, [$institutionID]);

    // Insert the new institution details (teacher information)
    if (isset($input['details']) && is_array($input['details'])) {
        foreach ($input['details'] as $detail) {
            $detail_sql = "INSERT INTO sndInstitutionDetails (InstitutionID, TeacherName, Designation, ContactPhone, sndClassID, sndSubjectID) 
                           VALUES (?, ?, ?, ?, ?, ?)";
            $detail_params = [
                $institutionID, 
                $detail['TeacherName'] ?? null, 
                $detail['Designation'] ?? null, 
                $detail['ContactPhone'] ?? null, 
                $detail['sndClassID'] ?? null, 
                $detail['sndSubjectID'] ?? null
            ];
            sqlsrv_query($conn, $detail_sql, $detail_params);
        }
    }

    // Return success message
    echo json_encode(["message" => "Institution updated successfully", "InstitutionScanImagePath" => $imagePath]);
}


// Function to update an existing institution (Android API)
function update_institutionAndroid($conn, $institutionID) {
    // Initialize variables
    $imagePath = null;

    // Check if a new image file is uploaded
    if (isset($_FILES['InstitutionScanImage']) && $_FILES['InstitutionScanImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/institution_images/";
        $fileName = uniqid("Institution_", true) . "." . pathinfo($_FILES['InstitutionScanImage']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
                echo json_encode(["error" => "Failed to create directory for image upload"]);
                return;
            }
        }

        // Move the uploaded file to the server directory
        if (!move_uploaded_file($_FILES['InstitutionScanImage']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving institution scan image"]);
            return;
        }

        // Set the relative path to save in the database
        $imagePath = "uploads/institution_images/" . $fileName;
    }

    // Check for JSON data
    $input = $_POST;

    // Validate required fields
    if (!isset($input['institutionName']) || !isset($input['institutionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Use the existing image path if no new image is uploaded
    if (!$imagePath) {
        $imageFetchSQL = "SELECT InstitutionScanImagePath FROM sndInstitutions WHERE InstitutionID = ?";
        $imageStmt = sqlsrv_query($conn, $imageFetchSQL, [$institutionID]);

        if ($imageStmt !== false && $row = sqlsrv_fetch_array($imageStmt, SQLSRV_FETCH_ASSOC)) {
            $imagePath = $row['InstitutionScanImagePath'];
        }
    }

    // SQL Update query for updating institution information
    $sql = "UPDATE sndInstitutions SET 
            InstitutionTypeID = ?, 
            InstitutionName = ?, 
            TotalStudents = ?, 
            ContactPersonName = ?, 
            Designation = ?, 
            ContactPhone = ?, 
            Address = ?, 
            RegionID = ?, 
			EIINNo = ?,
            InstitutionScanImagePath = ?, 
            ModifiedAt = GETDATE() 
            WHERE InstitutionID = ?";

    $params = [
        $input['institutionTypeID'], 
        $input['institutionName'], 
        $input['TotalStudents'] ?? null, 
        $input['ContactPersonName'] ?? null, 
        $input['Designation'] ?? null, 
        $input['ContactPhone'] ?? null, 
        $input['Address'] ?? null, 
        $input['RegionID'] ?? null, 
		$input['EIINNo'] ?? null, 
        $imagePath,
        $institutionID
    ];

    // Execute the update query for institution data
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error updating institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Construct the full image URL for response
    $fullImagePath = $imagePath ? "https://asianabpolymer.com/abpolymer/" . $imagePath : null;

    // Return success message
    echo json_encode([
        "message" => "Institution updated successfully",
        "InstitutionScanImagePath" => $fullImagePath
    ]);
}

function update_institutionAndroidwithoutimage($conn, $institutionID) {
    // Get JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (!isset($input['institutionName']) || !isset($input['institutionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // SQL Update query for updating institution information
    $sql = "UPDATE sndInstitutions SET 
            InstitutionTypeID = ?, 
            InstitutionName = ?, 
            TotalStudents = ?, 
            ContactPersonName = ?, 
            Designation = ?, 
            ContactPhone = ?, 
            Address = ?, 
            RegionID = ?, 
			EIINNo =?,
            ModifiedAt = GETDATE() 
            WHERE InstitutionID = ?";

    $params = [
        $input['institutionTypeID'], 
        $input['institutionName'], 
        $input['TotalStudents'] ?? null, 
        $input['ContactPersonName'] ?? null, 
        $input['Designation'] ?? null, 
        $input['ContactPhone'] ?? null, 
        $input['Address'] ?? null, 
        $input['RegionID'] ?? null, 
		$input['EIINNo'] ?? null, 
        $institutionID
    ];

    // Execute the update query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error updating institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success message
    echo json_encode([
        "message" => "Institution updated successfully"
    ]);
}

function update_institutionwithoutimage($conn, $institutionID) {
    // Check for JSON data
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields for institution
    if (!isset($input['institutionName']) || !isset($input['institutionTypeID'])) {
        echo json_encode(["error" => "Missing required fields for institution"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // SQL Update query for updating institution information
        $sql = "UPDATE sndInstitutions SET 
                InstitutionTypeID = ?, 
                InstitutionName = ?, 
                TotalStudents = ?, 
                ContactPersonName = ?, 
                Designation = ?, 
                ContactPhone = ?, 
                Address = ?, 
                RegionID = ?, 
				EIINNo =?,
                ModifiedAt = GETDATE() 
                WHERE InstitutionID = ?";

        $params = [
            $input['institutionTypeID'],
            $input['institutionName'],
            $input['TotalStudents'] ?? null,
            $input['ContactPersonName'] ?? null,
            $input['Designation'] ?? null,
            $input['ContactPhone'] ?? null,
            $input['Address'] ?? null,
            $input['RegionID'] ?? null,
			$input['EIINNo'] ?? null,
            $institutionID
        ];

        // Execute the update query for institution data
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            throw new Exception("Error updating institution: " . print_r(sqlsrv_errors(), true));
        }

        // Update or insert institution details
        if (isset($input['Details']) && is_array($input['Details'])) {
            foreach ($input['Details'] as $detail) {
                if (!isset($detail['TeacherName'], $detail['Designation'], $detail['ContactPhone'])) {
                    throw new Exception("Invalid detail format: " . json_encode($detail));
                }

                // Check if the detail exists
                $sqlCheck = "SELECT InstitutionDetailsID FROM sndInstitutionDetails 
                             WHERE InstitutionID = ? AND TeacherName = ? AND ContactPhone = ?";
                $paramsCheck = [$institutionID, $detail['TeacherName'], $detail['ContactPhone']];
                $stmtCheck = sqlsrv_query($conn, $sqlCheck, $paramsCheck);

                if ($stmtCheck === false) {
                    throw new Exception("Error checking institution detail: " . print_r(sqlsrv_errors(), true));
                }

                if ($row = sqlsrv_fetch_array($stmtCheck, SQLSRV_FETCH_ASSOC)) {
                    // Update existing detail
                    $sqlUpdateDetail = "UPDATE sndInstitutionDetails SET 
                                        Designation = ?, 
                                        sndClassID = ?, 
                                        sndSubjectID = ? 
                                        WHERE InstitutionDetailsID = ?";
                    $paramsUpdateDetail = [
                        $detail['Designation'],
                        $detail['sndClassID'] ?? null,
                        $detail['sndSubjectID'] ?? null,
                        $row['InstitutionDetailsID']
                    ];

                    $stmtUpdateDetail = sqlsrv_query($conn, $sqlUpdateDetail, $paramsUpdateDetail);
                    if ($stmtUpdateDetail === false) {
                        throw new Exception("Error updating institution detail: " . print_r(sqlsrv_errors(), true));
                    }
                } else {
                    // Insert new detail
                    $sqlInsertDetail = "INSERT INTO sndInstitutionDetails 
                                        (InstitutionID, TeacherName, Designation, ContactPhone, sndClassID, sndSubjectID) 
                                        VALUES (?, ?, ?, ?, ?, ?)";
                    $paramsInsertDetail = [
                        $institutionID,
                        $detail['TeacherName'],
                        $detail['Designation'],
                        $detail['ContactPhone'],
                        $detail['sndClassID'] ?? null,
                        $detail['sndSubjectID'] ?? null
                    ];

                    $stmtInsertDetail = sqlsrv_query($conn, $sqlInsertDetail, $paramsInsertDetail);
                    if ($stmtInsertDetail === false) {
                        throw new Exception("Error inserting institution detail: " . print_r(sqlsrv_errors(), true));
                    }
                }
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        echo json_encode(["success" => "Institution and details updated successfully"]);
    } catch (Exception $e) {
        // Rollback transaction in case of an error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function update_institutionAndroidwithoutimage1($conn, $institutionID) {
    // Check for JSON data
    $input = $_POST;

    // Validate required fields
    if (!isset($input['institutionTypeID']) || !isset($input['institutionName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // SQL Update query for updating institution information
    $sql = "UPDATE sndInstitutions SET 
            InstitutionTypeID = ?, 
            InstitutionName = ?, 
            TotalStudents = ?, 
            ContactPersonName = ?, 
            Designation = ?, 
            ContactPhone = ?, 
            Address = ?, 
            RegionID = ?, 
            ModifiedAt = GETDATE() 
            WHERE InstitutionID = ?";

    $params = [
        $input['institutionTypeID'], 
        $input['institutionName'], 
        $input['TotalStudents'] ?? null, 
        $input['ContactPersonName'] ?? null, 
        $input['Designation'] ?? null, 
        $input['ContactPhone'] ?? null, 
        $input['Address'] ?? null, 
        $input['RegionID'] ?? null, 
        $institutionID
    ];

    // Execute the update query for institution data
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error updating institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success message
    echo json_encode(["message" => "Institution updated successfully"]);
}


function update_institutionDetailsAndroid($conn, $InstitutionDetailsID) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate input
    if (!isset($InstitutionDetailsID)) {
        echo json_encode(["error" => "InstitutionDetailsID is required"]);
        return;
    }
    
    // Check if input for institution details is valid
    if (!isset($input['InstitutionID'])) {
        echo json_encode(["error" => "InstitutionID is required"]);
        return;
    }

    // Extract institution ID and other details
    $institutionID = $input['InstitutionID'];

    // Start transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Delete the old institution details
        $delete_sql = "DELETE FROM sndInstitutionDetails WHERE InstitutionDetailsID = ?";
        $delete_stmt = sqlsrv_query($conn, $delete_sql, [$InstitutionDetailsID]);
        if ($delete_stmt === false) {
            throw new Exception("Error deleting old institution details: " . print_r(sqlsrv_errors(), true));
        }

        // Prepare SQL for inserting new institution details
        $detail_sql = "INSERT INTO sndInstitutionDetails (InstitutionID, TeacherName, Designation, ContactPhone, sndClassID, sndSubjectID) 
                       VALUES (?, ?, ?, ?, ?, ?)";
        
        // Handle multiple or single records
        $details = $input['details'] ?? [$input]; // Assume `details` contains multiple records if provided
        foreach ($details as $detail) {
            $detail_params = [
                $institutionID,
                $detail['TeacherName'] ?? null,
                $detail['Designation'] ?? null,
                $detail['ContactPhone'] ?? null,
                $detail['sndClassID'] ?? null,
                $detail['sndSubjectID'] ?? null
            ];
            $detail_stmt = sqlsrv_query($conn, $detail_sql, $detail_params);
            if ($detail_stmt === false) {
                throw new Exception("Error inserting new institution details: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success message
        echo json_encode(["message" => "Institution details updated successfully"]);
    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}



// Function to delete a institution by ID
function delete_institution($conn, $institutionID) {
	
	// Delete details
    $delete_details_sql = "DELETE FROM sndInstitutionDetails WHERE institutionID = ?";
    sqlsrv_query($conn, $delete_details_sql, [$institutionID]);

	
    $sql = "DELETE FROM sndinstitutions WHERE institutionID = ?";
    $params = [$institutionID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting institution: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "institution deleted successfully"]);
}

// Function to delete a institution by ID
function delete_preceiptdetails($conn, $ProductReceiptDetailsID) {
	
	// Delete details
    $delete_details_sql = "DELETE FROM sndProductReceiptDetails WHERE ProductReceiptDetailsID = ?";
    sqlsrv_query($conn, $delete_details_sql, [$ProductReceiptDetailsID]);

	
    $sql = "DELETE FROM sndProductReceiptDetails WHERE ProductReceiptDetailsID = ?";
    $params = [$ProductReceiptDetailsID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting ProductReceiptDetails: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "ProductReceiptDetails deleted successfully"]);
}



// Fetch all parties
function get_all_parties($conn) {
    $sql = "SELECT [PartyID] ,[PartyName],[ContactPersonName],[ContactNumber],[Address] ,[CreditLimit],[DepositAmount] ,[OpeningBalance]
from sndPartyMaster order by PartyID desc";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching parties: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $parties = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $parties[] = $row;
    }

    echo json_encode($parties);
}

function get_parties_users($conn,$UserID) {
    $sql = "SELECT 
    pm.PartyID,
    pm.PartyName
FROM 
    sndPartyMaster pm
INNER JOIN 
    sndMapEmpRegionRegionView mmrv ON pm.RegionID = mmrv.AreaID 
WHERE 
    mmrv.UserID = ?;";
	$partyParams = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $partyParams);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching parties: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $parties = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $parties[] = $row;
    }

    echo json_encode($parties);
}

// Fetch all parties
function get_all_bindingparties($conn) {
    $sql = "SELECT [BindingPartyID] ,[PartyName] from PrdBindingParty order by PartyName";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching parties: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $parties = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $parties[] = $row;
    }

    echo json_encode($parties);
}


function get_partydetails($conn, $PartyID) {
    // Query to get the party details
    $partySQL = "SELECT 
                    [PartyID],
                    [PartyName],
                    [Address],
                    [RegionID],
                    [OwnerName],
                    [OwnerCurrentAddress],
                    [OwnerPermanentAddress],
                    [OwnerContactNumber],
                    [OwnerDateOfBirth],
                    [BusinessStartYear],
                    [Email],
                    [Website],
                    [ContactPersonName],
                    [ContactNumber],
                    [NoOfThana],
                    [NoOfDistrict],
                    [CreditLimit],
                    [DepositAmount],
                    [IsSamityMember],
                    [WayOfSendingLetters],
                    [OpeningBalance],
                    [OwnerPicturePath],
                    [OwnerNIDDocumentPath],
                    [TradeLicenseDocumentPath],
                    [SamityMembershipCardPath],
                    [TINCertificatePath],
                    [DepositChequePath],
                    [NonJudicialAgreementDocumentPath],
                    [AgreementDocumentPath],
                    [CreatedAt],
                    [ModifiedAt]
                FROM [dbo].[sndParty]
                WHERE [PartyID] = ?";
    $partyParams = [$PartyID];
    $partyStmt = sqlsrv_query($conn, $partySQL, $partyParams);
    
    if ($partyStmt === false) {
        echo json_encode(["error" => "Error fetching party details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }
    
    $party = sqlsrv_fetch_array($partyStmt, SQLSRV_FETCH_ASSOC);
    if (!$party) {
        echo json_encode(["error" => "Party not found"]);
        return;
    }
    
    // Query to get related areas
    $areaSQL = "SELECT [RegionID], [RegionName] FROM [dbo].[sndPartyArea] WHERE [PartyID] = ?";
    $areaStmt = sqlsrv_query($conn, $areaSQL, $partyParams);
    if ($areaStmt === false) {
        echo json_encode(["error" => "Error fetching party areas: " . print_r(sqlsrv_errors(), true)]);
        return;
    }
    
    $areas = [];
    while ($row = sqlsrv_fetch_array($areaStmt, SQLSRV_FETCH_ASSOC)) {
        $areas[] = $row;
    }
    $party['PartyAreas'] = $areas;

    // Query to get related documents
    $docsSQL = "SELECT [PartyOtherDocName], [PartyOtherDocPath] FROM [dbo].[sndPartyOthersDocs] WHERE [PartyID] = ?";
    $docsStmt = sqlsrv_query($conn, $docsSQL, $partyParams);
    if ($docsStmt === false) {
        echo json_encode(["error" => "Error fetching party documents: " . print_r(sqlsrv_errors(), true)]);
        return;
    }
    
    $documents = [];
    while ($row = sqlsrv_fetch_array($docsStmt, SQLSRV_FETCH_ASSOC)) {
        $documents[] = $row;
    }
    $party['OtherDocs'] = $documents;
    
    echo json_encode($party);
}

function get_partydetailsAndroid($conn, $partyID) {
    try {
        // Fetch the main party details
        $sql = "SELECT 
                    PartyName, 
                    Address, 
                    RegionID, 
                    OwnerName, 
                    OwnerCurrentAddress, 
                    OwnerPermanentAddress, 
                    OwnerContactNumber, 
                    FORMAT(OwnerDateOfBirth, 'yyyy-MM-dd') AS OwnerDateOfBirth, 
                    BusinessStartYear, 
                    Email, 
                    Website, 
                    ContactPersonName, 
                    ContactNumber, 
                    NoOfThana, 
                    NoOfDistrict, 
                    CreditLimit, 
                    DepositAmount, 
                    IsSamityMember, 
                    WayOfSendingLetters, 
                    OpeningBalance, 
                    OwnerPicturePath, 
                    OwnerNIDDocumentPath, 
                    TradeLicenseDocumentPath, 
                    SamityMembershipCardPath, 
                    TINCertificatePath, 
                    DepositChequePath, 
                    NonJudicialAgreementDocumentPath, 
                    AgreementDocumentPath 
                FROM sndPartyMaster 
                WHERE PartyID = ?";
        $stmt = sqlsrv_query($conn, $sql, [$partyID]);

        if ($stmt === false) {
            throw new Exception("Error fetching party details: " . print_r(sqlsrv_errors(), true));
        }

        // Check if the record exists
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            // Add full image URLs for each file path
            $baseUrl = "https://asianabpolymer.com/abpolymer/uploads/party_files/";
            $imageFields = [
                'OwnerPicturePath', 
                'OwnerNIDDocumentPath', 
                'TradeLicenseDocumentPath', 
                'SamityMembershipCardPath', 
                'TINCertificatePath', 
                'DepositChequePath', 
                'NonJudicialAgreementDocumentPath', 
                'AgreementDocumentPath'
            ];

            foreach ($imageFields as $field) {
                $row[$field] = $row[$field] ? $baseUrl . $row[$field] : null;
            }

            // Return the party details as JSON
            echo json_encode([
                "message" => "Party details fetched successfully",
                "data" => $row
            ]);
        } else {
            echo json_encode(["error" => "Party not found"]);
        }
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function get_partyDocs($conn, $PartyID) {
    try {
        // Validate PartyID
        $PartyID = trim($PartyID);
        if (!is_numeric($PartyID)) {
            echo json_encode(["error" => "Invalid PartyID. Must be a number."]);
            http_response_code(400); // Bad Request
            return;
        }

        // Fetch PartyName from the database
        $queryPartyName = "SELECT PartyName FROM sndPartyMaster WHERE PartyID = ?";
        $stmtPartyName = sqlsrv_query($conn, $queryPartyName, [$PartyID]);

        if ($stmtPartyName === false || !($rowPartyName = sqlsrv_fetch_array($stmtPartyName, SQLSRV_FETCH_ASSOC))) {
            throw new Exception("PartyID not found in the database.");
        }

        $PartyName = $rowPartyName['PartyName'];

        // Fetch documents associated with the PartyID
        $queryDocs = "SELECT 
                        PD.PartyDocsID, 
                        PD.PartyDocsTypeID, 
                        DT.PartyDocName, 
                        PD.PartyDocsPath, 
                        PD.CreatedAt, 
                        PD.ModifiedAt
                      FROM sndPartyDocs PD
                      INNER JOIN sndPartyDocsType DT ON PD.PartyDocsTypeID = DT.PartyDocsTypeID
                      WHERE PD.PartyID = ?";
        $stmtDocs = sqlsrv_query($conn, $queryDocs, [$PartyID]);

        if ($stmtDocs === false) {
            throw new Exception("Error retrieving party documents: " . print_r(sqlsrv_errors(), true));
        }

        // Base URL for constructing the full document path
        $baseUrl = "https://asianabpolymer.com/abpolymer/uploads/party_files/";

        // Collect documents into an array
        $documents = [];
        while ($row = sqlsrv_fetch_array($stmtDocs, SQLSRV_FETCH_ASSOC)) {
            if (!$row['PartyDocName']) {
                throw new Exception("PartyDocName not found for PartyDocsTypeID: " . $row['PartyDocsTypeID']);
            }

            $filename = basename($row['PartyDocsPath']); // Extract file name from path
            $encodedPartyName = rawurlencode($PartyName); // Use rawurlencode to ensure proper encoding
            $docUrl = $baseUrl . $encodedPartyName . "/" . $filename; // Construct the full URL

            $documents[] = [
                "PartyDocsID" => $row['PartyDocsID'],
                "PartyDocsTypeID" => $row['PartyDocsTypeID'],
                "PartyDocName" => $row['PartyDocName'], // From sndPartyDocsType
                "PartyDocsPath" => $docUrl, // Constructed URL
                "CreatedAt" => $row['CreatedAt'] ? $row['CreatedAt']->format('Y-m-d H:i:s') : null,
                "ModifiedAt" => $row['ModifiedAt'] ? $row['ModifiedAt']->format('Y-m-d H:i:s') : null
            ];
        }

        // Return the party name and associated documents
        echo json_encode([
            "PartyID" => $PartyID,
            "PartyName" => $PartyName,
            "Documents" => $documents
        ]);
    } catch (Exception $e) {
        // Handle exceptions and return an error message
        echo json_encode(["error" => $e->getMessage()]);
    }
}


// Fetch a single party by ID
function get_party($conn, $PartyID) {
            $sql = "SELECT 
                    PartyName, 
                    Address, 
                    RegionID, 
                    OwnerName, 
                    OwnerCurrentAddress, 
                    OwnerPermanentAddress, 
                    OwnerContactNumber, 
                    FORMAT(OwnerDateOfBirth, 'yyyy-MM-dd') AS OwnerDateOfBirth, 
                    BusinessStartYear, 
                    Email, 
                    Website, 
                    ContactPersonName, 
                    ContactNumber, 
                    NoOfThana, 
                    NoOfDistrict, 
                    CreditLimit, 
                    DepositAmount, 
                    IsSamityMember, 
                    WayOfSendingLetters, 
                    OpeningBalance
                FROM sndPartyMaster 
                WHERE PartyID = ?";
    $params = [$PartyID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching party: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $party = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($party) {
        echo json_encode($party);
    } else {
        echo json_encode(["error" => "Party not found"]);
    }
}

// Fetch a single party by ID
function get_UserMenuPermissions($conn, $UserID) {
    $sql = "SELECT 
                UR.UserRoleName as role,
                '[' + STUFF((
                    SELECT ', \"' + M.MenuName + '\"'
                    FROM sndUserPrivileges UP2
                    INNER JOIN sndMenu M ON UP2.MenuID = M.MenuID
                    WHERE UP2.RoleID = UR.RoleID
                    FOR XML PATH('')
                ), 1, 2, '') + ']' AS permissions
            FROM 
                sndUserRole UR
            INNER JOIN 
                sndUserRoleMapping URM ON UR.RoleID = URM.RoleID
            INNER JOIN 
                sndUsers U ON U.UserID = URM.UserID
            WHERE 
                U.UserID = ?";

    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching UserPrvilage: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $UserPrivilage = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Decode permissions JSON string to an array
        $row['permissions'] = json_decode($row['permissions']);
        $UserPrivilage[] = $row;
    }

    echo json_encode($UserPrivilage);
}

// Fetch a single party by ID
function get_UserMenuPermissionsBasic($conn, $UserID) {
            $sql = "SELECT 
    UP.PrivilegeID,
    U.UserID,
    U.Username,
    U.EmployeeID,
    U.EmpName,
    (SELECT Name FROM HrmDesignations WHERE HrmDesignations.ID = U.DesignationID) AS Designation,
    UR.RoleID,
    UR.UserRoleName,
    M.MenuID,
    M.MenuName,
    UP.MenuAccess,
    UP.CanEdit,
    UP.CanUpdate,
    UP.CanDelete
FROM 
    sndUserPrivileges UP
INNER JOIN 
    sndMenu M ON UP.MenuID = M.MenuID
INNER JOIN 
    sndUserRole UR ON UP.RoleID = UR.RoleID
INNER JOIN 
    sndUserRoleMapping URM ON URM.RoleID = UR.RoleID
INNER JOIN 
    sndUsers U ON U.UserID = URM.UserID
WHERE 
    M.AppsFunction = 'Basic' 
    AND U.UserID = ?";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
        echo json_encode(["error" => "Error fetching UserPrvilage: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $UserPrvilage = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $UserPrvilage[] = $row;
    }

    echo json_encode($UserPrvilage);
}

// Fetch a single party by ID
function get_UserMenuPermissionsSettings($conn, $UserID) {
            $sql = "SELECT 
    UP.PrivilegeID,
    U.UserID,
    U.Username,
    U.EmployeeID,
    U.EmpName,
    (SELECT Name FROM HrmDesignations WHERE HrmDesignations.ID = U.DesignationID) AS Designation,
    UR.RoleID,
    UR.UserRoleName,
    M.MenuID,
    M.MenuName,
    UP.MenuAccess,
    UP.CanEdit,
    UP.CanUpdate,
    UP.CanDelete
FROM 
    sndUserPrivileges UP
INNER JOIN 
    sndMenu M ON UP.MenuID = M.MenuID
INNER JOIN 
    sndUserRole UR ON UP.RoleID = UR.RoleID
INNER JOIN 
    sndUserRoleMapping URM ON URM.RoleID = UR.RoleID
INNER JOIN 
    sndUsers U ON U.UserID = URM.UserID
WHERE 
    M.AppsFunction = 'Settings' 
    AND U.UserID = ?";
    $params = [$UserID];
    $stmt1 = sqlsrv_query($conn, $sql, $params);

if ($stmt1 === false) {
        echo json_encode(["error" => "Error fetching UserPrvilageSettings: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $UserPrvilageSettings = [];
    while ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
        $UserPrvilageSettings[] = $row;
    }

    echo json_encode($UserPrvilageSettings);
}

function get_UserMenuPermissionsTransaction($conn, $UserID) {
            $sql = "SELECT 
    UP.PrivilegeID,
    U.UserID,
    U.Username,
    U.EmployeeID,
    U.EmpName,
    (SELECT Name FROM HrmDesignations WHERE HrmDesignations.ID = U.DesignationID) AS Designation,
    UR.RoleID,
    UR.UserRoleName,
    M.MenuID,
    M.MenuName,
    UP.MenuAccess,
    UP.CanEdit,
    UP.CanUpdate,
    UP.CanDelete
FROM 
    sndUserPrivileges UP
INNER JOIN 
    sndMenu M ON UP.MenuID = M.MenuID
INNER JOIN 
    sndUserRole UR ON UP.RoleID = UR.RoleID
INNER JOIN 
    sndUserRoleMapping URM ON URM.RoleID = UR.RoleID
INNER JOIN 
    sndUsers U ON U.UserID = URM.UserID
WHERE 
    M.AppsFunction = 'Transaction' 
    AND U.UserID = ?";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
        echo json_encode(["error" => "Error fetching UserPrvilage: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $UserPrvilage = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $UserPrvilage[] = $row;
    }

    echo json_encode($UserPrvilage);
}

function get_UserMenuPermissionsReports($conn, $UserID) {
            $sql = "SELECT 
    UP.PrivilegeID,
    U.UserID,
    U.Username,
    U.EmployeeID,
    U.EmpName,
    (SELECT Name FROM HrmDesignations WHERE HrmDesignations.ID = U.DesignationID) AS Designation,
    UR.RoleID,
    UR.UserRoleName,
    M.MenuID,
    M.MenuName,
    UP.MenuAccess,
    UP.CanEdit,
    UP.CanUpdate,
    UP.CanDelete
FROM 
    sndUserPrivileges UP
INNER JOIN 
    sndMenu M ON UP.MenuID = M.MenuID
INNER JOIN 
    sndUserRole UR ON UP.RoleID = UR.RoleID
INNER JOIN 
    sndUserRoleMapping URM ON URM.RoleID = UR.RoleID
INNER JOIN 
    sndUsers U ON U.UserID = URM.UserID
WHERE 
    M.AppsFunction = 'Reports' 
    AND U.UserID = ?";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
        echo json_encode(["error" => "Error fetching UserPrvilage: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $UserPrvilage = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $UserPrvilage[] = $row;
    }

    echo json_encode($UserPrvilage);
}


// Create a new party with related data for sndPartyArea and sndPartyOthersDocs
function create_partydetails($conn) {
    try {
        // Start transaction
        sqlsrv_begin_transaction($conn);

        // Ensure the input is properly retrieved
        $input = $_POST;
        $input['PartyAreas'] = $input['PartyAreas'] ?? [];
        $input['OtherDocs'] = $input['OtherDocs'] ?? [];

        // Validate required fields
        if (empty($input['PartyName']) || empty($input['RegionID']) || empty($input['Address'])) {
            throw new Exception("PartyName, RegionID, and Address are required");
        }

        // Prepare file upload directory
        $targetDir = __DIR__ . "/uploads/party_files/";
        $partyFolder = $targetDir . $input['PartyName'];

        // Ensure directory exists or create it
        if (!is_dir($partyFolder)) {
            if (!mkdir($partyFolder, 0755, true) && !is_dir($partyFolder)) {
                throw new Exception("Failed to create directory for party files");
            }
        }

        // Handle optional file uploads
        $fileFields = [
            'OwnerPicturePath',
            'OwnerNIDDocumentPath',
            'TradeLicenseDocumentPath',
            'SamityMembershipCardPath',
            'TINCertificatePath',
            'DepositChequePath',
            'NonJudicialAgreementDocumentPath',
            'AgreementDocumentPath'
        ];

        $filePaths = [];

        foreach ($fileFields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                $fileName = uniqid($field . "_", true) . "." . pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                $targetFilePath = $partyFolder . "/" . $fileName;

                if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetFilePath)) {
                    $filePaths[$field] = 'uploads/party_files/' . $input['PartyName'] . '/' . $fileName;
                } else {
                    throw new Exception("Failed to upload $field");
                }
            } else {
                $filePaths[$field] = null; // Pass null when no file is uploaded
            }
        }

        // Insert into sndParty table
        $sql = "INSERT INTO [dbo].[sndParty] (
                    [PartyName], [Address], [RegionID], [OwnerName], [OwnerCurrentAddress], 
                    [OwnerPermanentAddress], [OwnerContactNumber], [OwnerDateOfBirth], 
                    [BusinessStartYear], [Email], [Website], [ContactPersonName], 
                    [ContactNumber], [NoOfThana], [NoOfDistrict], [CreditLimit], 
                    [DepositAmount], [IsSamityMember], [WayOfSendingLetters], [OpeningBalance], 
                    [OwnerPicturePath], [OwnerNIDDocumentPath], [TradeLicenseDocumentPath], 
                    [SamityMembershipCardPath], [TINCertificatePath], [DepositChequePath], 
                    [NonJudicialAgreementDocumentPath], [AgreementDocumentPath], [CreatedAt], [ModifiedAt]
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";

        $params = [
            $input['PartyName'],
            $input['Address'],
            $input['RegionID'],
            $input['OwnerName'] ?? null,
            $input['OwnerCurrentAddress'] ?? null,
            $input['OwnerPermanentAddress'] ?? null,
            $input['OwnerContactNumber'] ?? null,
            validateAndFormatDate($input['OwnerDateOfBirth'] ?? null),
            $input['BusinessStartYear'] ?? null,
            $input['Email'] ?? null,
            $input['Website'] ?? null,
            $input['ContactPersonName'] ?? null,
            $input['ContactNumber'] ?? null,
            $input['NoOfThana'] ?? null,
            $input['NoOfDistrict'] ?? null,
            $input['CreditLimit'] ?? null,
            $input['DepositAmount'] ?? null,
            $input['IsSamityMember'] ?? null,
            $input['WayOfSendingLetters'] ?? null,
            $input['OpeningBalance'] ?? null,
            $filePaths['OwnerPicturePath'],
            $filePaths['OwnerNIDDocumentPath'],
            $filePaths['TradeLicenseDocumentPath'],
            $filePaths['SamityMembershipCardPath'],
            $filePaths['TINCertificatePath'],
            $filePaths['DepositChequePath'],
            $filePaths['NonJudicialAgreementDocumentPath'],
            $filePaths['AgreementDocumentPath']
        ];

		

        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            throw new Exception("Error in INSERT query: " . print_r(sqlsrv_errors(), true));
        }

		     // Commit the transaction
        sqlsrv_commit($conn);
        // Fetch last inserted PartyID
        $partyIDResult = sqlsrv_query($conn, "SELECT SCOPE_IDENTITY() AS PartyID");
        if ($partyIDResult === false) {
            throw new Exception("Error fetching last PartyID: " . print_r(sqlsrv_errors(), true));
        }
        $partyIDData = sqlsrv_fetch_array($partyIDResult);
        $PartyID = $partyIDData['PartyID'] ?? null;

        if (!$PartyID) {
            throw new Exception("Failed to retrieve PartyID.");
        }

        // Insert into sndPartyArea
        $areaSQL = "INSERT INTO sndPartyArea (PartyID, RegionID, RegionName) VALUES (?, ?, ?)";
        foreach ($input['PartyAreas'] as $area) {
            $areaParams = [$partyID, $area['RegionID'] ?? null, $area['RegionName'] ?? null];
            $areaStmt = sqlsrv_query($conn, $areaSQL, $areaParams);
            if ($areaStmt === false) {
                throw new Exception("Error inserting party area: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Insert into sndPartyOthersDocs
        $docSQL = "INSERT INTO sndPartyOthersDocs (PartyID, PartyOtherDocName, PartyOtherDocPath) VALUES (?, ?, ?)";
        foreach ($input['OtherDocs'] as $doc) {
            $docParams = [$partyID, $doc['PartyOtherDocName'] ?? null, $doc['PartyOtherDocPath'] ?? null];
            $docStmt = sqlsrv_query($conn, $docSQL, $docParams);
            if ($docStmt === false) {
                throw new Exception("Error inserting party documents: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        echo json_encode(["message" => "Party created successfully", "PartyID" => $partyID]);

    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function create_partyDocs($conn, $PartyID) {
    try {
        // Start transaction
        sqlsrv_begin_transaction($conn);

        // Validate PartyID
        $PartyID = trim($PartyID);
        if (!is_numeric($PartyID)) {
            echo json_encode(["error" => "Invalid PartyID. Must be a number."]);
            http_response_code(400); // Bad Request
            return;
        }

        // Retrieve PartyName from the database
        $query = "SELECT PartyName FROM sndPartyMaster WHERE PartyID = ?";
        $stmt = sqlsrv_query($conn, $query, [$PartyID]);

        if ($stmt === false || !($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
            throw new Exception("PartyID not found in the database.");
        }

        // Sanitize PartyName
        $PartyName = sanitize_folder_name(trim($row['PartyName']));

        // Prepare file upload directory using PartyName
        $targetDir = __DIR__ . "/uploads/party_files/";
        $partyFolder = $targetDir . $PartyName;

        // Log the path for debugging
        error_log("Party Folder: " . $partyFolder);

        // Ensure directory exists or create it
        if (!is_dir($partyFolder)) {
            if (!@mkdir($partyFolder, 0755, true)) { // Suppress warnings with '@' for better error handling
                $error = error_get_last();
                error_log("Failed to create directory: " . $partyFolder . " - " . $error['message']);
                throw new Exception("Failed to create directory for party files: " . $error['message']);
            }
        }

        // Ensure the input is properly retrieved
        $input = $_POST;

        // Validate required fields
        if (empty($input['PartyDocsTypeID'])) {
            throw new Exception("PartyDocsTypeID is required");
        }

        // Handle multiple file uploads
        $uploadedFiles = [];
        if (isset($_FILES['PartyDocsPath']) && is_array($_FILES['PartyDocsPath']['name'])) {
            $totalFiles = count($_FILES['PartyDocsPath']['name']);

            for ($i = 0; $i < $totalFiles; $i++) {
                if ($_FILES['PartyDocsPath']['error'][$i] === UPLOAD_ERR_OK) {
                    $originalFileName = $_FILES['PartyDocsPath']['name'][$i];
                    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                    $fileName = uniqid("PartyDocs_", true) . "." . $fileExtension;
                    $targetFilePath = $partyFolder . "/" . $fileName;

                    if (move_uploaded_file($_FILES['PartyDocsPath']['tmp_name'][$i], $targetFilePath)) {
                        // Use rawurlencode to encode the PartyName for the URL
                        $encodedPartyName = rawurlencode($PartyName);
                        $uploadedFiles[] = [
                            "PartyDocsTypeID" => $input['PartyDocsTypeID'][$i] ?? null,
                            "PartyDocsPath" => "https://asianabpolymer.com/abpolymer/uploads/party_files/" . $encodedPartyName . "/" . $fileName
                        ];
                    } else {
                        throw new Exception("Failed to upload file " . $originalFileName);
                    }
                }
            }
        }

        // Insert each uploaded document into the database
        $sql = "INSERT INTO [dbo].[sndPartyDocs]
                ([PartyID], [PartyDocsTypeID], [PartyDocsPath], [CreatedAt], [ModifiedAt])
                VALUES (?, ?, ?, GETDATE(), GETDATE())";

        foreach ($uploadedFiles as $file) {
            $params = [
                $PartyID,
                $file['PartyDocsTypeID'],
                $file['PartyDocsPath']
            ];
            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                throw new Exception("Error in INSERT query: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit the transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Party documents uploaded successfully",
            "uploadedFiles" => $uploadedFiles
        ]);
    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

// Helper function to sanitize folder names
function sanitize_folder_name($folderName) {
    // Remove invalid characters for Windows
    return preg_replace('/[<>:"\/\\|?*]/', '', $folderName);
}




function update_partydetailsAndroid($conn, $partyID) {
    try {
        // Validate PartyID
        $partyID = trim($partyID);
        if (!is_numeric($partyID)) {
            echo json_encode(["error" => "Invalid PartyID. Must be a number."]);
            http_response_code(400); // Bad Request
            return;
        }
        $partyID = (int)$partyID; // Convert to integer

       
        // Validate and sanitize input data
        $fieldsToUpdate = [
            "PartyName", "Address", "RegionID", "OwnerName", "OwnerCurrentAddress", 
            "OwnerPermanentAddress", "OwnerContactNumber", "OwnerDateOfBirth", 
            "BusinessStartYear", "Email", "Website", "ContactPersonName", 
            "ContactNumber", "NoOfThana", "NoOfDistrict", "CreditLimit", 
            "DepositAmount", "IsSamityMember", "WayOfSendingLetters", 
            "OpeningBalance"
        ];
        
        $imageFields = [
            "OwnerPicturePath", "OwnerNIDDocumentPath", "TradeLicenseDocumentPath", 
            "SamityMembershipCardPath", "TINCertificatePath", "DepositChequePath", 
            "NonJudicialAgreementDocumentPath", "AgreementDocumentPath"
        ];

        $updateData = [];
        foreach ($fieldsToUpdate as $field) {
            if (isset($input[$field])) {
                $updateData[$field] = trim($input[$field]);
            }
        }

        // Handle file uploads for image fields
        foreach ($imageFields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                // Check if the file exists and delete it if needed
                $currentFilePath = getCurrentFilePath($conn, $partyID, $field);
                if ($currentFilePath && file_exists(__DIR__ . "/uploads/party_files/" . $currentFilePath)) {
                    unlink(__DIR__ . "/uploads/party_files/" . $currentFilePath); // Delete the old file
                }

                // Upload new file
                $fileName = uniqid($field . "_", true) . "." . pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                $targetDir = __DIR__ . "/uploads/party_files/";
                $targetPath = $targetDir . $fileName;

                // Ensure directory exists
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                // Move uploaded file
                if (!move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
                    throw new Exception("Error uploading file for $field");
                }

                // Store relative path
                $updateData[$field] = "party_files/" . $fileName;
            }
        }

        // Check if there's data to update
        if (empty($updateData)) {
            echo json_encode(["error" => "No data provided for update"]);
            http_response_code(400); // Bad Request
            return;
        }

        // Generate dynamic SQL for updating
        $updateFields = [];
        $updateParams = [];
        foreach ($updateData as $field => $value) {
            $updateFields[] = "$field = ?";
            $updateParams[] = $value;
        }
        $updateParams[] = $partyID; // Add PartyID for the WHERE clause

        $updateSQL = "UPDATE sndParty SET " . implode(", ", $updateFields) . " WHERE PartyID = ?";
        $stmt = sqlsrv_query($conn, $updateSQL, $updateParams);

        if ($stmt === false) {
            throw new Exception("Error updating party details: " . print_r(sqlsrv_errors(), true));
        }

        // Return success response
        echo json_encode(["message" => "Party details updated successfully", "PartyID" => $partyID]);
        http_response_code(200); // OK
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
        http_response_code(500); // Internal Server Error
    }
}


function getCurrentFilePath($conn, $partyID, $field) {
    // Retrieve the current file path from the database
    $sql = "SELECT $field FROM sndParty WHERE PartyID = ?";
    $stmt = sqlsrv_query($conn, $sql, [$partyID]);

    if ($stmt === false) {
        throw new Exception("Error fetching current file path for $field");
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    return $row[$field] ?? null;
}



// Function to validate and format date inputs
function validateAndFormatDate($date) {
    if (empty($date)) {
        return null; // Return null if no date is provided
    }
    $dateTime = DateTime::createFromFormat('Y-m-d', $date);
    if ($dateTime) {
        return $dateTime->format('Y-m-d'); // Return the formatted date
    }
    return null; // Return null if the date is invalid
}

function create_partydetailsAreas($conn, $PartyID) {
    try {
        // Validate PartyID
        $PartyID = trim($PartyID); // Remove whitespace or newline
        if (!is_numeric($PartyID)) {
            echo json_encode(["error" => "Invalid PartyID. Must be a number."]);
            http_response_code(400); // Bad Request
            return;
        }
        $PartyID = (int)$PartyID; // Convert to integer

        // Decode input JSON
        $input = json_decode(file_get_contents("php://input"), true);

        if (!$input || !isset($input['PartyAreas']) || !is_array($input['PartyAreas'])) {
            echo json_encode(["error" => "Invalid or missing PartyAreas data"]);
            http_response_code(400); // Bad Request
            return;
        }

        // Start transaction
        sqlsrv_begin_transaction($conn);

        // Insert into sndPartyArea table
        $areaSQL = "INSERT INTO sndPartyArea (PartyID, RegionID, RegionName) VALUES (?, ?, ?)";
        foreach ($input['PartyAreas'] as $area) {
            // Validate and sanitize inputs
            $RegionID = isset($area['RegionID']) ? trim($area['RegionID']) : null;
            $RegionName = isset($area['RegionName']) ? trim($area['RegionName']) : null;

            if (!is_numeric($RegionID)) {
                throw new Exception("Invalid RegionID for one of the PartyAreas. Must be a number.");
            }

            $RegionID = (int)$RegionID; // Convert to integer

            // Prepare parameters for the SQL query
            $areaParams = [
                $PartyID,
                $RegionID,
                $RegionName
            ];

            $areaStmt = sqlsrv_query($conn, $areaSQL, $areaParams);
            if ($areaStmt === false) {
                throw new Exception("Error inserting party area: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success message
        echo json_encode(["message" => "Party Area created successfully", "PartyID" => $PartyID]);
        http_response_code(200); // OK

    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
        http_response_code(500); // Internal Server Error
    }
}

function get_partydetailsAreas($conn, $PartyID) {
    try {
        // Validate PartyID
        $PartyID = trim($PartyID); // Remove whitespace or newline
        if (!is_numeric($PartyID)) {
            echo json_encode(["error" => "Invalid PartyID. Must be a number."]);
            http_response_code(400); // Bad Request
            return;
        }
        $PartyID = (int)$PartyID; // Convert to integer

        // Query to fetch area details for the PartyID
        $areaSQL = "SELECT RegionID, RegionName FROM sndPartyArea WHERE PartyID = ?";
        $areaStmt = sqlsrv_query($conn, $areaSQL, [$PartyID]);

        if ($areaStmt === false) {
            echo json_encode(["error" => "Error fetching area details"]);
            http_response_code(500); // Internal Server Error
            return;
        }

        // Collect all area details
        $partyAreas = [];
        while ($row = sqlsrv_fetch_array($areaStmt, SQLSRV_FETCH_ASSOC)) {
            $partyAreas[] = [
                "RegionID" => $row['RegionID'],
                "RegionName" => $row['RegionName']
            ];
        }

        // If no areas found, return a message
        if (empty($partyAreas)) {
            echo json_encode(["message" => "No areas found for the specified PartyID", "PartyID" => $PartyID]);
            http_response_code(404); // Not Found
            return;
        }

        // Return the fetched areas
        echo json_encode([
            "PartyID" => $PartyID,
            "PartyAreas" => $partyAreas
        ]);
        http_response_code(200); // OK

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
        http_response_code(500); // Internal Server Error
    }
}


function update_partydetailsAreas($conn, $PartyID) {
    try {
        // Validate PartyID
        $PartyID = trim($PartyID); // Remove whitespace/newlines
        if (!is_numeric($PartyID)) {
            echo json_encode(["error" => "Invalid PartyID. Must be a number."]);
            http_response_code(400); // Bad Request
            return;
        }
        $PartyID = (int)$PartyID; // Convert to integer

        // Decode the input JSON
        $input = json_decode(file_get_contents("php://input"), true);

        if (!$input || !isset($input['PartyAreas']) || !is_array($input['PartyAreas'])) {
            echo json_encode(["error" => "Invalid or missing PartyAreas data."]);
            http_response_code(400); // Bad Request
            return;
        }

        // Start transaction
        sqlsrv_begin_transaction($conn);

        // Fetch existing regions for the given PartyID
        $existingSQL = "SELECT RegionID FROM sndPartyArea WHERE PartyID = ?";
        $existingStmt = sqlsrv_query($conn, $existingSQL, [$PartyID]);
        if ($existingStmt === false) {
            throw new Exception("Error fetching existing regions: " . print_r(sqlsrv_errors(), true));
        }

        $existingRegions = [];
        while ($row = sqlsrv_fetch_array($existingStmt, SQLSRV_FETCH_ASSOC)) {
            $existingRegions[] = $row['RegionID'];
        }

        // Prepare for update, insert, and delete operations
        $newRegions = [];
        foreach ($input['PartyAreas'] as $area) {
            $RegionID = isset($area['RegionID']) ? trim($area['RegionID']) : null;
            $RegionName = isset($area['RegionName']) ? trim($area['RegionName']) : null;

            if (!is_numeric($RegionID)) {
                throw new Exception("Invalid RegionID for one of the PartyAreas. Must be a number.");
            }
            $RegionID = (int)$RegionID;
            $newRegions[] = $RegionID;

            // Check if the RegionID already exists
            if (in_array($RegionID, $existingRegions)) {
                // Update existing region
                $updateSQL = "UPDATE sndPartyArea SET RegionName = ? WHERE PartyID = ? AND RegionID = ?";
                $updateParams = [$RegionName, $PartyID, $RegionID];
                $updateStmt = sqlsrv_query($conn, $updateSQL, $updateParams);
                if ($updateStmt === false) {
                    throw new Exception("Error updating region: " . print_r(sqlsrv_errors(), true));
                }
            } else {
                // Insert new region
                $insertSQL = "INSERT INTO sndPartyArea (PartyID, RegionID, RegionName) VALUES (?, ?, ?)";
                $insertParams = [$PartyID, $RegionID, $RegionName];
                $insertStmt = sqlsrv_query($conn, $insertSQL, $insertParams);
                if ($insertStmt === false) {
                    throw new Exception("Error inserting new region: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Delete regions not in the new list
        $regionsToDelete = array_diff($existingRegions, $newRegions);
        if (!empty($regionsToDelete)) {
            $deleteSQL = "DELETE FROM sndPartyArea WHERE PartyID = ? AND RegionID = ?";
            foreach ($regionsToDelete as $regionToDelete) {
                $deleteStmt = sqlsrv_query($conn, $deleteSQL, [$PartyID, $regionToDelete]);
                if ($deleteStmt === false) {
                    throw new Exception("Error deleting region: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success message
        echo json_encode(["message" => "Party Areas updated successfully", "PartyID" => $PartyID]);
        http_response_code(200); // OK

    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
        http_response_code(500); // Internal Server Error
    }
}

function delete_partyDocs($conn, $PartyDocsID) {
    try {
        // Validate PartyDocsID
        if (!is_numeric($PartyDocsID)) {
            throw new Exception("Invalid PartyDocsID. Must be a number.");
        }

        // Fetch the document record
        $query = "SELECT PartyDocsPath FROM sndPartyDocs WHERE PartyDocsID = ?";
        $stmt = sqlsrv_query($conn, $query, [$PartyDocsID]);

        if ($stmt === false || !($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
            throw new Exception("PartyDocsID not found in sndPartyDocs.");
        }

        $PartyDocsPath = $row['PartyDocsPath'];
        $fullFilePath = __DIR__ . "/" . $PartyDocsPath; // Full path of the document file

        // Begin transaction
        sqlsrv_begin_transaction($conn);

        // Delete the record from the database
        $deleteSQL = "DELETE FROM sndPartyDocs WHERE PartyDocsID = ?";
        $deleteStmt = sqlsrv_query($conn, $deleteSQL, [$PartyDocsID]);

        if ($deleteStmt === false) {
            throw new Exception("Error deleting record from sndPartyDocs: " . print_r(sqlsrv_errors(), true));
        }

        // Delete the document file from the server
        if (file_exists($fullFilePath)) {
            if (!unlink($fullFilePath)) {
                throw new Exception("Failed to delete the document file: $fullFilePath");
            }
        }

        // Commit the transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Party document deleted successfully.",
            "deletedFile" => $PartyDocsPath
        ]);
    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function update_partyDocs($conn, $PartyID) {
    try {
        // Validate PartyID
        if (!is_numeric($PartyID)) {
            throw new Exception("Invalid PartyID. Must be a number.");
        }

        // Fetch PartyName based on PartyID
        $partyQuery = "SELECT PartyName FROM sndPartyMaster WHERE PartyID = ?";
        $partyStmt = sqlsrv_query($conn, $partyQuery, [$PartyID]);
        if ($partyStmt === false || !($partyRow = sqlsrv_fetch_array($partyStmt, SQLSRV_FETCH_ASSOC))) {
            throw new Exception("PartyID not found in sndPartyMaster.");
        }
        $PartyName = $partyRow['PartyName'];

        // Prepare file upload directory
        $targetDir = __DIR__ . "/uploads/party_files/";
        $partyFolder = $targetDir . $PartyName;

        // Ensure directory exists or create it
        if (!is_dir($partyFolder)) {
            if (!mkdir($partyFolder, 0755, true) && !is_dir($partyFolder)) {
                throw new Exception("Failed to create directory for party files.");
            }
        }

        // Validate input
        $input = $_POST;
        if (!isset($input['PartyDocsTypeID']) || !isset($_FILES['PartyDocs']['name'])) {
            throw new Exception("PartyDocsTypeID and document files are required.");
        }
        $PartyDocsTypeID = $input['PartyDocsTypeID'];

        // Handle multiple file uploads
        $filePaths = [];
        if (is_array($_FILES['PartyDocs']['name'])) {
            for ($i = 0; $i < count($_FILES['PartyDocs']['name']); $i++) {
                if ($_FILES['PartyDocs']['error'][$i] === UPLOAD_ERR_OK) {
                    $fileName = uniqid("PartyDoc_", true) . "." . pathinfo($_FILES['PartyDocs']['name'][$i], PATHINFO_EXTENSION);
                    $targetFilePath = $partyFolder . "/" . $fileName;

                    if (move_uploaded_file($_FILES['PartyDocs']['tmp_name'][$i], $targetFilePath)) {
                        $filePaths[] = "uploads/party_files/" . $PartyName . "/" . $fileName;
                    } else {
                        throw new Exception("Failed to upload file: " . $_FILES['PartyDocs']['name'][$i]);
                    }
                }
            }
        } else {
            throw new Exception("No files uploaded in PartyDocs.");
        }

        // Start transaction
        sqlsrv_begin_transaction($conn);

        // Insert or update party documents in the database
        foreach ($filePaths as $filePath) {
            $sql = "INSERT INTO [dbo].[sndPartyDocs] 
                        ([PartyID], [PartyDocsTypeID], [PartyDocsPath], [CreatedAt], [ModifiedAt]) 
                    VALUES (?, ?, ?, GETDATE(), GETDATE())";
            $params = [$PartyID, $PartyDocsTypeID, $filePath];

            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                throw new Exception("Error in INSERT query: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit the transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Party documents updated successfully.",
            "uploadedFiles" => $filePaths
        ]);
    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

// Create a new party
function create_party($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['PartyName'])) {
        echo json_encode(["error" => "Missing PartyName fields"]);
        return;
    }
	    if (!isset($input['Address'])) {
        echo json_encode(["error" => "Missing Address fields"]);
        return;
    }

	    if (!isset($input['RegionID'])) {
        echo json_encode(["error" => "Missing Region fields"]);
        return;
    }
	
	$sql = "INSERT INTO [dbo].[sndPartyMaster] (
           [PartyName],
           [Address],
           [RegionID],
           [OwnerName],
           [OwnerCurrentAddress],
           [OwnerPermanentAddress],
           [OwnerContactNumber],
           [OwnerDateOfBirth],
           [BusinessStartYear],
           [Email],
           [Website],
           [ContactPersonName],
           [ContactNumber],
           [NoOfThana],
           [NoOfDistrict],
           [CreditLimit],
           [DepositAmount],
           [IsSamityMember],
           [WayOfSendingLetters],
           [OpeningBalance],
           [CreatedAt],
           [ModifiedAt]
           ) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";


$params = [
           $input['PartyName'],
           $input['Address'],
           $input['RegionID'] ?? null,
           $input['OwnerName'] ?? null,
           $input['OwnerCurrentAddress'] ?? null,
           $input['OwnerPermanentAddress'] ?? null,
           $input['OwnerContactNumber'] ?? null,
           $input['OwnerDateOfBirth'] ?? null,
           $input['BusinessStartYear'] ?? null,
           $input['Email'] ?? null,
           $input['Website'] ?? null,
           $input['ContactPersonName'] ?? null,
           $input['ContactNumber'] ?? null,
           $input['NoOfThana'] ?? null,
           $input['NoOfDistrict'] ?? null,
           $input['CreditLimit'] ?? null,
           $input['DepositAmount'] ?? null,
           $input['IsSamityMember'] ?? null,
           $input['WayOfSendingLetters'] ?? null,
           $input['OpeningBalance'] ?? null
	];

   
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating party: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Party created successfully"]);
}


// Update an existing party
function update_party($conn, $PartyID) {
    $input = json_decode(file_get_contents("php://input"), true);

     if (!isset($input['PartyName'])) {
        echo json_encode(["error" => "Missing PartyName fields"]);
        return;
    }
	    if (!isset($input['Address'])) {
        echo json_encode(["error" => "Missing Address fields"]);
        return;
    }

	    if (!isset($input['RegionID'])) {
        echo json_encode(["error" => "Missing Region fields"]);
        return;
    }
	
	$sql = "UPDATE sndPartyMaster SET 
           PartyName = ?,
           Address = ?,
           RegionID = ?,
           OwnerName = ?,
           OwnerCurrentAddress = ?,
           OwnerPermanentAddress = ?,
           OwnerContactNumber = ?,
           OwnerDateOfBirth = ?,
           BusinessStartYear = ?,
           Email = ?,
           Website = ?,
           ContactPersonName = ?,
           ContactNumber = ?,
           NoOfThana = ?,
           NoOfDistrict = ?,
           CreditLimit = ?,
           DepositAmount = ?,
           IsSamityMember = ?,
           WayOfSendingLetters = ?,
           OpeningBalance = ?,
           ModifiedAt = GETDATE()
           WHERE PartyID = ?";
	
	$params = [
           $input['PartyName'],
           $input['Address'],
           $input['RegionID'] ?? null,
           $input['OwnerName'] ?? null,
           $input['OwnerCurrentAddress'] ?? null,
           $input['OwnerPermanentAddress'] ?? null,
           $input['OwnerContactNumber'] ?? null,
           $input['OwnerDateOfBirth'] ?? null,
           $input['BusinessStartYear'] ?? null,
           $input['Email'] ?? null,
           $input['Website'] ?? null,
           $input['ContactPersonName'] ?? null,
           $input['ContactNumber'] ?? null,
           $input['NoOfThana'] ?? null,
           $input['NoOfDistrict'] ?? null,
           $input['CreditLimit'] ?? null,
           $input['DepositAmount'] ?? null,
           $input['IsSamityMember'] ?? null,
           $input['WayOfSendingLetters'] ?? null,
           $input['OpeningBalance'] ?? null,
		   $PartyID
	];


    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating party: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Party updated successfully"]);
}


// Update an existing party and its details
function update_partydetails($conn, $PartyID) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (!isset($input['PartyName'])) {
        echo json_encode(["error" => "Missing required fields: PartyName is required"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Update the main party record in sndParty table
        $sql = "UPDATE [dbo].[sndParty] SET 
                   [PartyName] = ?,
                   [Address] = ?,
                   [RegionID] = ?,
                   [OwnerName] = ?,
                   [OwnerCurrentAddress] = ?,
                   [OwnerPermanentAddress] = ?,
                   [OwnerContactNumber] = ?,
                   [OwnerDateOfBirth] = ?,
                   [BusinessStartYear] = ?,
                   [Email] = ?,
                   [Website] = ?,
                   [ContactPersonName] = ?,
                   [ContactNumber] = ?,
                   [NoOfThana] = ?,
                   [NoOfDistrict] = ?,
                   [CreditLimit] = ?,
                   [DepositAmount] = ?,
                   [IsSamityMember] = ?,
                   [WayOfSendingLetters] = ?,
                   [OpeningBalance] = ?,
                   [OwnerPicturePath] = ?,
                   [OwnerNIDDocumentPath] = ?,
                   [TradeLicenseDocumentPath] = ?,
                   [SamityMembershipCardPath] = ?,
                   [TINCertificatePath] = ?,
                   [DepositChequePath] = ?,
                   [NonJudicialAgreementDocumentPath] = ?,
                   [AgreementDocumentPath] = ?,
                   [ModifiedAt] = GETDATE()
               WHERE [PartyID] = ?";

        $params = [
            $input['PartyName'],
            $input['Address'] ?? null,
            $input['RegionID'] ?? null,
            $input['OwnerName'] ?? null,
            $input['OwnerCurrentAddress'] ?? null,
            $input['OwnerPermanentAddress'] ?? null,
            $input['OwnerContactNumber'] ?? null,
            $input['OwnerDateOfBirth'] ?? null,
            $input['BusinessStartYear'] ?? null,
            $input['Email'] ?? null,
            $input['Website'] ?? null,
            $input['ContactPersonName'] ?? null,
            $input['ContactNumber'] ?? null,
            $input['NoOfThana'] ?? null,
            $input['NoOfDistrict'] ?? null,
            $input['CreditLimit'] ?? null,
            $input['DepositAmount'] ?? null,
            $input['IsSamityMember'] ?? null,
            $input['WayOfSendingLetters'] ?? null,
            $input['OpeningBalance'] ?? null,
            $input['OwnerPicturePath'] ?? null,
            $input['OwnerNIDDocumentPath'] ?? null,
            $input['TradeLicenseDocumentPath'] ?? null,
            $input['SamityMembershipCardPath'] ?? null,
            $input['TINCertificatePath'] ?? null,
            $input['DepositChequePath'] ?? null,
            $input['NonJudicialAgreementDocumentPath'] ?? null,
            $input['AgreementDocumentPath'] ?? null,
            $PartyID
        ];

        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            throw new Exception("Error updating party: " . print_r(sqlsrv_errors(), true));
        }

        // Delete and reinsert related data in sndPartyArea table
        $deleteAreaSQL = "DELETE FROM sndPartyArea WHERE PartyID = ?";
        $deleteAreaStmt = sqlsrv_query($conn, $deleteAreaSQL, [$PartyID]);
        if ($deleteAreaStmt === false) {
            throw new Exception("Error deleting party areas: " . print_r(sqlsrv_errors(), true));
        }

        if (isset($input['PartyAreas'])) {
            $insertAreaSQL = "INSERT INTO sndPartyArea (PartyID, RegionID, RegionName) VALUES (?, ?, ?)";
            foreach ($input['PartyAreas'] as $area) {
                $areaParams = [
                    $PartyID,
                    $area['RegionID'] ?? null,
                    $area['RegionName'] ?? null
                ];
                $areaStmt = sqlsrv_query($conn, $insertAreaSQL, $areaParams);
                if ($areaStmt === false) {
                    throw new Exception("Error inserting party area: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Delete and reinsert related data in sndPartyOthersDocs table
        $deleteDocsSQL = "DELETE FROM sndPartyOthersDocs WHERE PartyID = ?";
        $deleteDocsStmt = sqlsrv_query($conn, $deleteDocsSQL, [$PartyID]);
        if ($deleteDocsStmt === false) {
            throw new Exception("Error deleting party documents: " . print_r(sqlsrv_errors(), true));
        }

        if (isset($input['OtherDocs'])) {
            $insertDocsSQL = "INSERT INTO sndPartyOthersDocs (PartyID, PartyOtherDocName, PartyOtherDocPath) VALUES (?, ?, ?)";
            foreach ($input['OtherDocs'] as $doc) {
                $docParams = [
                    $PartyID,
                    $doc['PartyOtherDocName'] ?? null,
                    $doc['PartyOtherDocPath'] ?? null
                ];
                $docStmt = sqlsrv_query($conn, $insertDocsSQL, $docParams);
                if ($docStmt === false) {
                    throw new Exception("Error inserting party documents: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        echo json_encode(["message" => "Party updated successfully"]);

    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}



// Delete a party by ID
function delete_party($conn, $PartyID) {
    $sql = "DELETE FROM sndParty WHERE PartyID = ?";
    $params = [$PartyID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting party: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Party deleted successfully"]);
}

// Function to create a new mapping
function create_mapping($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['UserID']) || !isset($input['RegionID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "INSERT INTO sndMapEmpRegion (UserID, RegionID) VALUES (?, ?)";
    $params = [$input['UserID'], $input['RegionID']];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating mapping: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Mapping created successfully"]);
}

// Function to fetch all mappings
function get_all_mappings($conn) {
    $sql = "SELECT * FROM sndMapEmpRegion";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching mappings: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $mappings = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $mappings[] = $row;
    }

    echo json_encode($mappings);
}

// Function to fetch a single mapping by ID
function get_mapping($conn, $ID) {
    $sql = "SELECT * FROM sndMapEmpRegion WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching mapping: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $mapping = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($mapping) {
        echo json_encode($mapping);
    } else {
        echo json_encode(["error" => "Mapping not found"]);
    }
}

// Function to update an existing mapping
function update_mapping($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['UserID']) || !isset($input['RegionID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndMapEmpRegion SET UserID = ?, RegionID = ? WHERE ID = ?";
    $params = [$input['UserID'], $input['RegionID'], $ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating mapping: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Mapping updated successfully"]);
}

// Function to delete a mapping
function delete_mapping($conn, $ID) {
    $sql = "DELETE FROM sndMapEmpRegion WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["message" => "Mapping deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting mapping: " . print_r(sqlsrv_errors(), true)]);
    }
}


// Fetch all regions
function get_all_regions($conn) {
    $sql = "SELECT 
	    Area.RegionID AS AreaID,
   -- Division.RegionID AS DivisionID,
    Division.RegionName AS DivisionName,
   -- District.RegionID AS DistrictID,
    District.RegionName AS DistrictName,
   -- Thana.RegionID AS ThanaID,
    Thana.RegionName AS ThanaName,
    Area.RegionName AS AreaName
FROM 
    sndRegions AS Division

-- Join District Data
LEFT JOIN sndRegions AS District 
    ON District.ParentRegionID = Division.RegionID 
    AND Division.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Division')
    AND District.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'District')

-- Join Thana Data
LEFT JOIN sndRegions AS Thana 
    ON Thana.ParentRegionID = District.RegionID
    AND Thana.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Thana')

-- Join Area Data
LEFT JOIN sndRegions AS Area 
    ON Area.ParentRegionID = Thana.RegionID
    AND Area.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Area')

-- Filter only Divisions
WHERE Division.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Division')
ORDER BY Division.RegionName, District.RegionName, Thana.RegionName, Area.RegionName
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching regions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $regions = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $regions[] = $row;
    }

    echo json_encode($regions);
}

function get_location($conn, $RegionID) {
    try {
        // Parse the input RegionID into individual filters
        $filters = json_decode($RegionID, true);

        // Prepare the base SQL query
        $sql = "
            SELECT 
                DivisionID, 
                DivisionName, 
                DistrictID, 
                DistrictName, 
                ThanaID, 
                ThanaName, 
                AreaID, 
                AreaName, 
                RegionTypeID
            FROM 
                sndregionview
            WHERE 
                AreaID IS NOT NULL
                AND (DivisionID = ? OR ? IS NULL)
                AND (DistrictID = ? OR ? IS NULL)
                AND (ThanaID = ? OR ? IS NULL)
                AND (AreaID = ? OR ? IS NULL)
        ";

        // Set parameters for the query based on filters
        $params = [
            $filters['DivisionID'] ?? null, 
            $filters['DivisionID'] ?? null,
            $filters['DistrictID'] ?? null, 
            $filters['DistrictID'] ?? null,
            $filters['ThanaID'] ?? null, 
            $filters['ThanaID'] ?? null,
            $filters['AreaID'] ?? null, 
            $filters['AreaID'] ?? null
        ];

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);

        // Check if query execution was successful
        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $locations = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $locations[] = $row;
        }

        // Return the results as JSON
        echo json_encode([
            "success" => true,
            "data" => $locations
        ]);
    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}

function get_singlearealocation($conn, $RegionID) {
    try {
        // Parse or fallback to scalar value
        $filters = json_decode($RegionID, true);
        $regionIDValue = $filters['RegionID'] ?? $RegionID;

        // Log the parsed value
        error_log("Executing query for RegionID: " . $regionIDValue);

        // Prepare SQL
        $sql = "
            SELECT 
                DivisionID, 
                DivisionName, 
                DistrictID, 
                DistrictName, 
                ThanaID, 
                ThanaName, 
                AreaID, 
                AreaName, 
                RegionTypeID
            FROM 
                sndregionview
            WHERE 
                AreaID = ?
        ";
        $params = [$regionIDValue];

        // Log the query and parameters
        error_log("SQL Query: $sql");
        error_log("SQL Parameters: " . print_r($params, true));

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch results
        $locations = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $locations[] = $row;
        }

        // Log result count
        error_log("Number of rows fetched: " . count($locations));

        // Return results
        echo json_encode([
            "success" => true,
            "data" => $locations
        ]);
    } catch (Exception $e) {
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}


// Fetch a single Area by ID
function get_regionview($conn, $AreaRegionID) {
    $sql = "SELECT 
    Area.RegionID AS AreaID,
    Division.RegionID AS DivisionID,
    Division.RegionName AS DivisionName,
    District.RegionID AS DistrictID,
    District.RegionName AS DistrictName,
    Thana.RegionID AS ParentRegionID,
    Thana.RegionName AS ThanaName,
    Area.RegionName AS AreaName,
    Area.RegionTypeID AS RegionTypeID
FROM 
    sndRegions AS Division

-- Join District Data
LEFT JOIN sndRegions AS District 
    ON District.ParentRegionID = Division.RegionID 
    AND Division.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Division')
    AND District.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'District')

-- Join Thana Data
LEFT JOIN sndRegions AS Thana 
    ON Thana.ParentRegionID = District.RegionID
    AND Thana.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Thana')

-- Join Area Data
LEFT JOIN sndRegions AS Area 
    ON Area.ParentRegionID = Thana.RegionID
    AND Area.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Area')

-- Filter only Divisions
WHERE Division.RegionTypeID = (SELECT ID FROM sndCategorydata WHERE CategoryType = 'Region' AND CategoryName = 'Division')
and  Area.RegionID = ?
ORDER BY Division.RegionName, District.RegionName, Thana.RegionName, Area.RegionName;
";
    $params = [$AreaRegionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Area: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $Area = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $Area[] = $row;
    }

    echo json_encode($Area);
}


// Fetch all regions
function get_all_regionDivision($conn) {
    $sql = "select RegionID, RegionName from sndRegions where RegionTypeID in 
(select ID from sndCategorydata where CategoryType = 'Region' and CategoryName like 'Division%')
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching regions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $regions = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $regions[] = $row;
    }

    echo json_encode($regions);
}


// Fetch a single region by ID
function get_parentregions($conn, $RegionTypeID) {
    $sql = "select RegionID,RegionName from sndRegions where RegionID in (select ParentRegionID from sndRegions where RegionTypeID =?)";
    $params = [$RegionTypeID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching parentregion: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $parentregions = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($parentregions) {
        echo json_encode($parentregions);
    } else {
        echo json_encode(["error" => "parentregions not found"]);
    }
}

// Fetch a single region by ID
function get_region($conn, $RegionID) {
    $sql = "SELECT * FROM sndRegions WHERE RegionID = ?";
    $params = [$RegionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching region: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $region = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($region) {
        echo json_encode($region);
    } else {
        echo json_encode(["error" => "Region not found"]);
    }
}

// Fetch a single District by ID
function get_regionDistrict($conn, $ParentRegionID) {
    $sql = "select RegionID, RegionName from sndRegions where ParentRegionID = ?";
    $params = [$ParentRegionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching District: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $District = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $District[] = $row;
    }

    echo json_encode($District);
}

// Fetch a single District by ID
function get_regionThana($conn, $ParentRegionID) {
    $sql = "select RegionID, RegionName from sndRegions where ParentRegionID = ?";
    $params = [$ParentRegionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Thana: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $Thana = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $Thana[] = $row;
    }

    echo json_encode($Thana);
}

// Fetch a single Area by ID
function get_regionArea($conn, $ParentRegionID) {
    $sql = "select RegionID, RegionName from sndRegions where ParentRegionID = ?";
    $params = [$ParentRegionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Area: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $Area = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $Area[] = $row;
    }

    echo json_encode($Area);
}



function create_region($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['RegionName']) || !isset($input['RegionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "INSERT INTO sndRegions (RegionName, RegionTypeID, ParentRegionID, CreatedAt, ModifiedAt) 
            VALUES (?, ?, ?, GETDATE(), GETDATE())";
    
    $params = [
        $input['RegionName'],
        $input['RegionTypeID'],
        $input['ParentRegionID'] ?? null
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating region: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Region created successfully"]);
}


function update_region($conn, $RegionID) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate input
    if (!isset($input['RegionName']) || !isset($input['RegionTypeID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Start a transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Step 1: Delete the existing region
        $deleteSql = "DELETE FROM sndRegions WHERE RegionID = ?";
        $deleteParams = [$RegionID];
        $deleteStmt = sqlsrv_query($conn, $deleteSql, $deleteParams);

        if ($deleteStmt === false) {
            throw new Exception("Error deleting region: " . print_r(sqlsrv_errors(), true));
        }

        // Step 2: Insert the updated region as a new record
        $insertSql = "INSERT INTO sndRegions (RegionName, RegionTypeID, ParentRegionID, CreatedAt, ModifiedAt) 
                      VALUES (?, ?, ?, GETDATE(), GETDATE())";
        $insertParams = [
            $input['RegionName'],
            $input['RegionTypeID'],
            $input['ParentRegionID'] ?? null
        ];
        $insertStmt = sqlsrv_query($conn, $insertSql, $insertParams);

        if ($insertStmt === false) {
            throw new Exception("Error creating region: " . print_r(sqlsrv_errors(), true));
        }

        // Commit the transaction
        sqlsrv_commit($conn);

        // Fetch the newly created RegionID
        $identitySql = "SELECT SCOPE_IDENTITY() AS RegionID";
        $identityStmt = sqlsrv_query($conn, $identitySql);
        $newRegionID = null;

        if ($identityStmt && $row = sqlsrv_fetch_array($identityStmt, SQLSRV_FETCH_ASSOC)) {
            $newRegionID = $row['RegionID'];
        }

        echo json_encode([
            "message" => "Region updated successfully",
            "NewRegionID" => $newRegionID
        ]);
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function delete_region($conn, $RegionID) {
    $sql = "DELETE FROM sndRegions WHERE RegionID = ?";
    $params = [$RegionID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting region: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Region deleted successfully"]);
}

// Fetch all products
function get_all_products($conn) {
    $sql = "SELECT ProductID
      ,ProductName
	  ,Categoryid
      ,(select CategoryName from sndCategorydata WHERE CategoryType = 'books-category' and sndCategorydata.id = Categoryid) as Category,status 
	  FROM sndProducts order by ProductID";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching products: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $products = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $products[] = $row;
    }

    echo json_encode($products);
}

// Fetch a single product by ID
function get_product($conn, $ProductID) {
    $sql = "SELECT ProductID
      ,ProductName
      ,(select CategoryName from sndCategorydata WHERE CategoryType = 'books-category' and sndCategorydata.id = Categoryid) as Category, status FROM sndProducts WHERE ProductID = ?";
    $params = [$ProductID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $product = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($product) {
        echo json_encode($product);
    } else {
        echo json_encode(["error" => "Product not found"]);
    }
}

function get_productcategorywise($conn, $Categoryid) {
    $sql = "SELECT ProductID
      ,ProductName FROM sndProducts WHERE Categoryid = ?";
    $params = [$Categoryid];
    $stmt = sqlsrv_query($conn, $sql, $params);

  //     $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching products: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $products = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $products[] = $row;
    }

    echo json_encode($products);
}

function get_productrate($conn, $FinancialYearID, $ProductID) {
    //$sql = "SELECT avg(Rate) as Rate FROM sndProductReceipt WHERE FinancialYearID = ? AND ProductID = ?";
	$sql = "SELECT avg(Rate) as Rate FROM sndProductReceiptdetails WHERE FinancialYearID = ? AND ProductID = ?";
    $params = [$FinancialYearID, $ProductID];
    
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product rate: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $rates = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $rates[] = $row['Rate'];
    }

    // If only one rate is expected, return it
    if (count($rates) === 1) {
        echo json_encode(["Rate" => $rates[0]]);
    } else {
        // If multiple rates exist, return them as an array
        echo json_encode(["Rates" => $rates]);
    }
}

function get_salesordersAutorizationMIS($conn, $SalesOrderNo) {
    //$sql = "SELECT avg(Rate) as Rate FROM sndProductReceipt WHERE FinancialYearID = ? AND ProductID = ?";
	$sql = "select AuthComments from sndApprovalDetails where ApprovalTypeID = ? and AppStatus = 1";
    $params = [$SalesOrderNo];
    
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product rate: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $AComments = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $AComments[] = $row['AuthComments'];
    }

    // If only one rate is expected, return it
    if (count($AComments) === 1) {
        echo json_encode(["DemandInfo" => $AComments[0]]);
		echo json_encode(["ReturnInfo" => $AComments[0]]);
		echo json_encode(["AuthComments" => $AComments[0]]);
    } else {
        // If multiple rates exist, return them as an array
        echo json_encode(["AComments" => $AComments]);
    }
}


// Create a new product
function create_product($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate input
    if (empty($input)) {
        echo json_encode(["error" => "Input data is required"]);
        return;
    }

    // Handle both single and multiple entries
    if (isset($input['ProductName']) && isset($input['Categoryid'])) {
        $products = [$input]; // Wrap single product in an array for uniform processing
    } elseif (is_array($input)) {
        $products = $input;
    } else {
        echo json_encode(["error" => "Invalid input format"]);
        return;
    }

    // Prepare SQL and execute for each product
    $sql = "INSERT INTO sndProducts (ProductName, Categoryid, CreatedAt, ModifiedAt) 
            VALUES (?, ?, GETDATE(), GETDATE())";

    $successCount = 0;
    $errors = [];

    foreach ($products as $product) {
        if (isset($product['ProductName']) && isset($product['Categoryid'])) {
            $params = [
                $product['ProductName'],
                $product['Categoryid']
            ];

            $stmt = sqlsrv_query($conn, $sql, $params);
            if ($stmt === false) {
                $errors[] = [
                    "ProductName" => $product['ProductName'],
                    "error" => print_r(sqlsrv_errors(), true)
                ];
            } else {
                $successCount++;
            }
        } else {
            $errors[] = [
                "ProductName" => $product['ProductName'] ?? "Unknown",
                "error" => "Missing required fields"
            ];
        }
    }

    // Return response
    if (empty($errors)) {
        echo json_encode(["message" => "$successCount product(s) created successfully"]);
    } else {
        echo json_encode([
            "message" => "$successCount product(s) created successfully",
            "errors" => $errors
        ]);
    }
}

// Update an existing product
function update_product($conn, $ProductID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['ProductName']) || !isset($input['Categoryid'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndProducts SET 
            ProductName = ?, 
            Categoryid = ?, 
			status = ?,
            ModifiedAt = GETDATE() 
            WHERE ProductID = ?";

    $params = [
        $input['ProductName'], 
        $input['Categoryid'], 
		$input['status'],
        $ProductID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating product: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Product updated successfully"]);
}


// Delete a product by ID
function delete_product($conn, $ProductID) {
    $sql = "DELETE FROM sndProducts WHERE ProductID = ?";
    $params = [$ProductID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting product: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Product deleted successfully"]);
}

// Fetch all demand collections
function get_all_demand_collections($conn) {
    $sql = "SELECT * FROM sndDemandCollection";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching demand collections: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $collections = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $collections[] = $row;
    }

    echo json_encode($collections);
}

// Fetch a single demand collection along with details
function get_demand_collection($conn, $DemandID) {
    $sql = "SELECT * FROM sndDemandCollection WHERE DemandID = ?";
    $params = [$DemandID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching demand collection: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $collection = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($collection) {
        // Fetch collection details
        $details_sql = "SELECT * FROM sndDemandCollectionDetails WHERE DemandID = ?";
        $details_stmt = sqlsrv_query($conn, $details_sql, $params);
        $details = [];
        while ($detail = sqlsrv_fetch_array($details_stmt, SQLSRV_FETCH_ASSOC)) {
            $details[] = $detail;
        }
        $collection['details'] = $details;
        echo json_encode($collection);
    } else {
        echo json_encode(["error" => "Demand collection not found"]);
    }
}

// Create a new demand collection with details
function create_demand_collection($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['VisitPlanID']) || !isset($input['UserID']) || !isset($input['RegionID']) || !isset($input['TotalDonationAmount'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "INSERT INTO sndDemandCollection (VisitPlanID, CollectionDate, UserID, RegionID, TotalDonationAmount, CreatedAt, ModifiedAt) 
            VALUES (?, GETDATE(), ?, ?, ?, GETDATE(), GETDATE())";
    
    $params = [
        $input['VisitPlanID'],
        $input['UserID'], 
        $input['RegionID'],
        $input['TotalDonationAmount']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating demand collection: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Get the last inserted DemandID
    $demandID = sqlsrv_insert_id();

    // Insert collection details
    foreach ($input['details'] as $detail) {
        $detail_sql = "INSERT INTO sndDemandCollectionDetails (DemandID, institutionID, Class, ProductID, StudentsCount, DonationAmount, EvidenceImagePath, ContactName, DonationDueAmount, CreatedAt, ModifiedAt) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";
        $detail_params = [
            $demandID, 
            $detail['institutionID'], 
            $detail['Class'] ?? null, 
            $detail['ProductID'], 
            $detail['StudentsCount'] ?? null, 
            $detail['DonationAmount'] ?? null, 
            $detail['EvidenceImagePath'] ?? null, 
            $detail['ContactName'] ?? null, 
            $detail['DonationDueAmount'] ?? null
        ];
        sqlsrv_query($conn, $detail_sql, $detail_params);
    }

    echo json_encode(["message" => "Demand collection created successfully", "DemandID" => $demandID]);
}

// Update a demand collection and its details
function update_demand_collection($conn, $DemandID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['VisitPlanID']) || !isset($input['UserID']) || !isset($input['RegionID']) || !isset($input['TotalDonationAmount'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndDemandCollection 
            SET VisitPlanID = ?, UserID = ?, RegionID = ?, TotalDonationAmount = ?, ModifiedAt = GETDATE()
            WHERE DemandID = ?";
    
    $params = [
        $input['VisitPlanID'], 
        $input['UserID'], 
        $input['RegionID'], 
        $input['TotalDonationAmount'], 
        $DemandID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating demand collection: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Delete old details
    $delete_sql = "DELETE FROM sndDemandCollectionDetails WHERE DemandID = ?";
    sqlsrv_query($conn, $delete_sql, [$DemandID]);

    // Insert new details
    foreach ($input['details'] as $detail) {
        $detail_sql = "INSERT INTO sndDemandCollectionDetails (DemandID, institutionID, Class, ProductID, StudentsCount, DonationAmount, EvidenceImagePath, ContactName, DonationDueAmount, CreatedAt, ModifiedAt) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";
        $detail_params = [
            $DemandID, 
            $detail['institutionID'], 
            $detail['Class'] ?? null, 
            $detail['ProductID'], 
            $detail['StudentsCount'] ?? null, 
            $detail['DonationAmount'] ?? null, 
            $detail['EvidenceImagePath'] ?? null, 
            $detail['ContactName'] ?? null, 
            $detail['DonationDueAmount'] ?? null
        ];
        sqlsrv_query($conn, $detail_sql, $detail_params);
    }

    echo json_encode(["message" => "Demand collection updated successfully"]);
}

// Delete a demand collection and its details
function delete_demand_collection($conn, $DemandID) {
    // Delete details
    $delete_details_sql = "DELETE FROM sndDemandCollectionDetails WHERE DemandID = ?";
    sqlsrv_query($conn, $delete_details_sql, [$DemandID]);

    // Delete the collection
    $sql = "DELETE FROM sndDemandCollection WHERE DemandID = ?";
    $stmt = sqlsrv_query($conn, [$DemandID]);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting demand collection: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Demand collection deleted successfully"]);
}

Function get_all_financialyears($conn) {
    $sql = "select id, name, OpeningDate,ClosingDate, YearClosingStatus from CmnTransactionalYears where ModuleId = '06' and CmnCompanyId = '2' AND Status = 1
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching financialyears: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $financialyears = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $financialyears[] = $row;
    }

    echo json_encode($financialyears);
}

Function get_financialyear($conn) {
    $sql = "select id, name from CmnTransactionalYears where ModuleId = '06' and CmnCompanyId = '2' AND Status = 1
";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching financialyears: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $financialyears = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $financialyears[] = $row;
    }

    echo json_encode($financialyears);
}

// Fetch all designations
function get_all_regiontypes($conn) {
    $sql = "SELECT * FROM sndCategorydata where CategoryType = 'region' order by id desc";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching regiontypes: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $regiontypes = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $regiontypes[] = $row;
    }

    echo json_encode($regiontypes);
}

function get_all_regiontype($conn) {
    $sql = "SELECT id,CategoryName FROM sndCategorydata where CategoryType = 'region'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching regiontypes: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $regiontypes = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $regiontypes[] = $row;
    }

    echo json_encode($regiontypes);
}

// Fetch a single regiontype by ID
function get_regiontype($conn, $ID) {
    $sql = "SELECT * FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching regiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $regiontype = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($regiontype) {
        echo json_encode($regiontype);
    } else {
        echo json_encode(["error" => "regiontype not found"]);
    }
}



// Create a new institutiontype
function create_regiontype($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating regiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "Regiontype created successfully"]);
}




// Update an existing designation
function update_regiontype($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryType = ?, 
            CategoryName = ?
            WHERE ID = ?";

    $params = [
        $input['CategoryType'], 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating regiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "regiontype updated successfully"]);
}

// Fetch all designations
function get_all_visitpurposes($conn) {
    $sql = "SELECT * FROM sndCategorydata where CategoryType = 'visitpurpose'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visitpurposes: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitpurposes = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $visitpurposes[] = $row;
    }

    echo json_encode($visitpurposes);
}

// Fetch a single visitpurpose by ID
function get_visitpurpose($conn, $ID) {
    $sql = "SELECT * FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visitpurpose: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitpurpose = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($visitpurpose) {
        echo json_encode($visitpurpose);
    } else {
        echo json_encode(["error" => "visitpurpose not found"]);
    }
}

// Create a new institutiontype
function create_visitpurpose($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating visitpurpose: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "visitpurpose created successfully"]);
}

// Update an existing designation
function update_visitpurpose($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Check if the record exists
    $check_sql = "SELECT COUNT(*) AS count FROM sndCategorydata WHERE ID = ?";
    $check_stmt = sqlsrv_query($conn, $check_sql, [$ID]);
    $row = sqlsrv_fetch_array($check_stmt, SQLSRV_FETCH_ASSOC);
    
    if ($row['count'] == 0) {
        echo json_encode(["error" => "ID not found"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryType = ?, 
            CategoryName = ?
            WHERE ID = ?";

    $params = [
        $input['CategoryType'], 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visitpurpose: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "visitpurpose updated successfully"]);
}

// Fetch all designations
function get_all_desigs($conn) {
	$sql = "select ID, name as CategoryName from HrmDesignations where CmnCompanyId = 2 and name in (select Designation from sndUsers where status =1)";
    //$sql = "SELECT * FROM sndCategorydata where CategoryType = 'Designation'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching designations: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $desigs = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $desigs[] = $row;
    }

    echo json_encode($desigs);
}



function get_usermapregion($conn, $EmployeeID)  {
try {
        // Ensure EmployeeID is provided
        if (empty($EmployeeID)) {
            throw new Exception("EmployeeID is required.");
        }

        // Prepare the SQL query
        $sql = "
            SELECT 
                u.UserID, 
                u.EmployeeID, 
                u.EmpName, 
                u.Designation, 
                u.UserRoleName, 
                r.DistrictName AS District, 
                r.ThanaName AS Thana, 
                r.AreaName AS Area
            FROM 
                snduserview u
            INNER JOIN 
                sndMapEmpRegion m ON u.UserID = m.UserID
            INNER JOIN 
                sndregionview r ON m.RegionID = r.AreaID OR m.RegionID = r.DistrictID OR m.RegionID = r.DivisionID OR m.RegionID = r.BangladeshID
            WHERE 
                u.EmployeeID = ?
            ORDER BY 
                r.BangladeshID, r.DivisionID, r.DistrictID, r.AreaID
        ";

        // Execute the query with EmployeeID as a parameter
        $stmt = sqlsrv_query($conn, $sql, [$EmployeeID]);

        // Check if query execution was successful
        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $regions = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $regions[] = $row;
        }

        // Check if any data was found
        if (empty($regions)) {
            echo json_encode([
                "success" => false,
                "message" => "No region mappings found for the provided EmployeeID."
            ]);
            return;
        }

        // Return the fetched data as JSON
        echo json_encode([
            "success" => true,
            "data" => $regions
        ]);

    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
	}

function get_allusermapregion($conn) {
    try {
        // Prepare the SQL query
        $sql = "
            SELECT 
			    u.UserID, 
                u.EmployeeID, 
                u.EmpName, 
                u.Designation, 
                u.UserRoleName, 
                r.DistrictName AS District, 
                r.ThanaName AS Thana, 
                r.AreaName AS Area
            FROM 
                snduserview u
            INNER JOIN 
                sndMapEmpRegion m ON u.UserID = m.UserID
            INNER JOIN 
                sndregionview r ON m.RegionID = r.AreaID OR m.RegionID = r.DistrictID OR m.RegionID = r.DivisionID OR m.RegionID = r.BangladeshID
				order by r.BangladeshID,r.DivisionID,r.DistrictID ,r.AreaID 
        ";

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql);

        // Check if query execution was successful
        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $users = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $users[] = $row;
        }

        // Return the fetched data as JSON
        echo json_encode([
            "success" => true,
            "data" => $users
        ]);

    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}

function get_allusermapregionsingle($conn, $EmployeeID) {
    try {
        // Ensure EmployeeID is provided
        if (empty($EmployeeID)) {
            throw new Exception("EmployeeID is required.");
        }

        // Prepare the SQL query
        $sql = "
            SELECT 
                u.UserID, 
                u.EmployeeID, 
                u.EmpName, 
                u.Designation, 
                u.UserRoleName, 
                r.DistrictName AS District, 
                r.ThanaName AS Thana, 
                r.AreaName AS Area
            FROM 
                snduserview u
            INNER JOIN 
                sndMapEmpRegion m ON u.UserID = m.UserID
            INNER JOIN 
                sndregionview r ON m.RegionID = r.AreaID OR m.RegionID = r.DistrictID OR m.RegionID = r.DivisionID OR m.RegionID = r.BangladeshID
            WHERE 
                u.EmployeeID = ?
            ORDER BY 
                r.BangladeshID, r.DivisionID, r.DistrictID, r.AreaID
        ";

        // Execute the query with EmployeeID as a parameter
        $stmt = sqlsrv_query($conn, $sql, [$EmployeeID]);

        // Check if query execution was successful
        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $regions = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $regions[] = $row;
        }

        // Check if any data was found
        if (empty($regions)) {
            echo json_encode([
                "success" => false,
                "message" => "No region mappings found for the provided EmployeeID."
            ]);
            return;
        }

        // Return the fetched data as JSON
        echo json_encode([
            "success" => true,
            "data" => $regions
        ]);

    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}

function get_userview($conn, $PDesignationID) {
    try {
        // Prepare the SQL query
        $sql = "
            SELECT 
                UserID,  
                EmployeeID, 
                EmpName, 
				DesignationID,
                Designation, 
                UserRoleName
            FROM 
                snduserview
            WHERE 
                PDesignationID = ? OR ? IS NULL
        ";

        // Set parameters for the query
        $params = [
            $PDesignationID,
            $PDesignationID
        ];

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);

        // Check if query execution was successful
        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $users = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $users[] = $row;
        }

        // Return the results as JSON
        echo json_encode([
            "success" => true,
            "data" => $users
        ]);
    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}



// Fetch a single designation by ID
function get_desig($conn, $ID) {
    $sql = "select ID, name as CategoryName from HrmDesignations where CmnCompanyId = 2 and name in (select Designation from sndUsers  where sndUsers.status =1) and ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching designation: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $desig = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($desig) {
        echo json_encode($desig);
    } else {
        echo json_encode(["error" => "designation not found"]);
    }
}


// Fetch all designations
function get_all_partydoctypes($conn) {
	$sql = "SELECT [PartyDocsTypeID] ,[PartyDocName] FROM [dbo].[sndPartyDocsType] order by PartyDocsTypeID";
    
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching PartyDocName: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $PartyDocName = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $PartyDocName[] = $row;
    }

    echo json_encode($PartyDocName);
}


// Fetch a single designation by PartyDocsTypeID
function get_partydoctype($conn, $PartyDocsTypeID) {
    $sql = "SELECT [PartyDocsTypeID],[PartyDocName] FROM [dbo].[sndPartyDocsType] where PartyDocsTypeID = ?";
    $params = [$PartyDocsTypeID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching PartyDocName: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $PartyDocName = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($PartyDocName) {
        echo json_encode($PartyDocName);
    } else {
        echo json_encode(["error" => "PartyDocName not found"]);
    }
}

// Create a new institutiontype
function create_desig($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating Designation: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "Designation created successfully"]);
}

// Update an existing designation
function update_desig($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryType = ?, 
            CategoryName = ?
            WHERE ID = ?";

    $params = [
        $input['CategoryType'], 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating designation: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "designation updated successfully"]);
}

// Delete a designation by ID
function delete_desig($conn, $ID) {
    $sql = "DELETE FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting designation: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "designation deleted successfully"]);
}

// Fetch all ClassInfos
function get_all_ClassInfos($conn) {
    $sql = "SELECT * FROM sndCategorydata where CategoryType = 'ClassInfo'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching ClassInfos: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $ClassInfos = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $ClassInfos[] = $row;
    }

    echo json_encode($ClassInfos);
}


// Fetch a single ClassInfo by ID
function get_ClassInfo($conn, $ID) {
    $sql = "SELECT * FROM sndCategorydata WHERE CategoryType = 'ClassInfo' and ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching ClassInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $ClassInfo = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($ClassInfo) {
        echo json_encode($ClassInfo);
    } else {
        echo json_encode(["error" => "ClassInfo not found"]);
    }
}

// Create a new institutiontype
function create_ClassInfo($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating ClassInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "ClassInfo created successfully"]);
}

// Update an existing ClassInfo
function update_ClassInfo($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryType = ?, 
            CategoryName = ?
            WHERE ID = ?";

    $params = [
        $input['CategoryType'], 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating ClassInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "ClassInfo updated successfully"]);
}

// Delete a ClassInfo by ID
function delete_ClassInfo($conn, $ID) {
    $sql = "DELETE FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting ClassInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "ClassInfo deleted successfully"]);
}

// Fetch all SubjectInfos
function get_all_subjectinfos($conn) {
    $sql = "SELECT * FROM sndSubjectInfo";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching SubjectInfos: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $subjectinfos = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $subjectinfos[] = $row;
    }

    echo json_encode($subjectinfos);
}


// Fetch a single SubjectInfo by ID
function get_subjectinfo($conn, $ID) {
    $sql = "SELECT * FROM sndSubjectInfo WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching SubjectInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $subjectinfo = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($subjectinfo) {
        echo json_encode($subjectinfo);
    } else {
        echo json_encode(["error" => "SubjectInfo not found"]);
    }
}

// Create a new institutiontype
function create_subjectinfo($conn) {
    $input = json_decode(file_get_contents("php://input"), true);
    
    // Debugging line removed for clean output
    // var_dump($input);
    
    // Check if required fields are set in the input
    if (!isset($input['SubjectName']) || !isset($input['sndClassID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndSubjectInfo (SubjectName, sndClassID) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['SubjectName'],  // SubjectName from input
        $input['sndClassID']   // sndClassID from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating SubjectInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "SubjectInfo created successfully"]);
}


// Update an existing SubjectInfo
function update_subjectinfo($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['SubjectName']) || !isset($input['sndClassID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndSubjectInfo SET 
            SubjectName = ?, 
            sndClassID = ?
            WHERE ID = ?";

    $params = [
        $input['SubjectName'], 
        $input['sndClassID'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating SubjectInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "SubjectInfo updated successfully"]);
}

// Delete a SubjectInfo by ID
function delete_subjectinfo($conn, $ID) {
    $sql = "DELETE FROM sndSubjectInfo WHERE ID = ?";
    $params = [$ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting SubjectInfo: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "SubjectInfo deleted successfully"]);
}



// Fetch all institutiontypes
function get_all_institutiontypes($conn) {
    $sql = "SELECT * FROM sndCategorydata where CategoryType = 'institution-type'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching institutiontypes: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $institutiontypes = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $institutiontypes[] = $row;
    }

    echo json_encode($institutiontypes);
}

// Fetch a single institutiontype by ID
function get_institutiontype($conn, $ID) {
    $sql = "SELECT * FROM sndCategorydata WHERE CategoryType = 'institution-type' and ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching institutiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $institutiontype = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($institutiontype) {
        echo json_encode($institutiontype);
    } else {
        echo json_encode(["error" => "institutiontype not found"]);
    }
}

// Create a new institutiontype
function create_institutiontype($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating institutiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "Institution type created successfully"]);
}

// Update an existing institutiontype
function update_institutiontype($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryName = ?
            WHERE CategoryType = 'institution-type' and ID = ?";

    $params = [ 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating institutiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "institutiontype updated successfully"]);
}

// Delete a institutiontype by ID
function delete_institutiontype($conn, $ID) {
    $sql = "DELETE FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting institutiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "institutiontype deleted successfully"]);
}


// Fetch all bookscategorys
function get_all_bookscategorys($conn) {
    $sql = "SELECT ID, CategoryName FROM sndCategorydata where CategoryType = 'books-category'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching bookscategorys: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $bookscategorys = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $bookscategorys[] = $row;
    }

    echo json_encode($bookscategorys);
}

// Fetch a single bookscategory by ID
function get_bookscategory($conn, $ID) {
    $sql = "SELECT * FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching bookscategory: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $bookscategory = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($bookscategory) {
        echo json_encode($bookscategory);
    } else {
        echo json_encode(["error" => "bookscategory not found"]);
    }
}

// Create a new bookscategory
function create_bookscategory($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating bookscategory: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "bookscategory created successfully"]);
}

// Update an existing designation
function update_bookscategory($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryType = ?, 
            CategoryName = ?
            WHERE ID = ?";

    $params = [
        $input['CategoryType'], 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating bookscategory: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "bookscategory updated successfully"]);
}

// Delete a bookscategory by ID
function delete_bookscategory($conn, $ID) {
    $sql = "DELETE FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting bookscategory: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "bookscategory deleted successfully"]);
}


// Fetch all tada_allowances
function get_all_tada_allowances($conn) {
    $sql = "SELECT * FROM sndCategorydata where CategoryType = 'TA/DA Allowance'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching tada_allowances: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $tada_allowances = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $tada_allowances[] = $row;
    }

    echo json_encode($tada_allowances);
}

// Fetch a single tada_allowance by ID
function get_tada_allowance($conn, $ID) {
    $sql = "SELECT * FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching tada_allowance: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $tada_allowance = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($tada_allowance) {
        echo json_encode($tada_allowance);
    } else {
        echo json_encode(["error" => "tada_allowance not found"]);
    }
}

// Create a new create_tada_allowance
function create_tada_allowance($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if required fields are set in the input
    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Insert query with placeholders
    $sql = "INSERT INTO sndCategorydata (CategoryType, CategoryName) 
            VALUES (?, ?)";

    // Bind the parameters from the input JSON
    $params = [
        $input['CategoryType'],  // CategoryType from input
        $input['CategoryName']   // CategoryName from input
    ];

    // Execute the SQL query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        echo json_encode(["error" => "Error creating tada_allowance: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // If successful, return a success message
    echo json_encode(["message" => "tada_allowance created successfully"]);
}

// Update an existing update_tada_allowance
function update_tada_allowance($conn, $ID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['CategoryType']) || !isset($input['CategoryName'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    $sql = "UPDATE sndCategorydata SET 
            CategoryType = ?, 
            CategoryName = ?
            WHERE ID = ?";

    $params = [
        $input['CategoryType'], 
        $input['CategoryName'], 
        $ID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating update_tada_allowance: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "update_tada_allowance updated successfully"]);
}


// Delete a tada_allowance by ID
function delete_tada_allowance($conn, $ID) {
    $sql = "DELETE FROM sndCategorydata WHERE ID = ?";
    $params = [$ID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting tada_allowance: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "tada_allowance deleted successfully"]);
}

function sndListoftheUserview($conn, $UserID) {
    // SQL query to execute the stored procedure
    $sql = "EXEC sndListoftheUsers ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the input parameter to the prepared statement
        $stmt->bind_param("i", $UserID);  // "i" stands for integer type
        
        // Execute the query
        $stmt->execute();
        
        // Get the result of the query
        $result = $stmt->get_result();
        
        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Fetch all results as an associative array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Return the result data
            return $data;
        } else {
            // Return an empty array if no rows found
            return [];
        }
    } else {
        // Return an error message if the statement preparation fails
        return "Error preparing the SQL statement.";
    }
}

function sndListoftheUserview1($conn, $UserID) {
    // SQL query to execute the stored procedure
    $sql = "EXEC sndListoftheUsers ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the input parameter to the prepared statement
        $stmt->bind_param("i", $UserID);  // "i" stands for integer type
        
        // Execute the query
        $stmt->execute();
        
        // Get the result of the query
        $result = $stmt->get_result();
        
        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Fetch all results as an associative array
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Return the result data
            return $data;
        } else {
            // Return an empty array if no rows found
            return [];
        }
    } else {
        // Return an error message if the statement preparation fails
        return "Error preparing the SQL statement.";
    }
}

function get_all_sndUsers($conn) { 
    $sql = "SELECT u.[UserID], u.[EmployeeID], u.[EmpName], u.[DesignationID],
(select name from HrmDesignations where CmnCompanyId = 2  and HrmDesignations.ID = u.DesignationID) as Designation,
	u.[Username], 
                   u.[Email], u.[Phone], u.[Address], 
                   r.[EmpName] as ReportingToUserID, 
                   u.[Status], u.[CreatedAt], u.[ModifiedAt]
            FROM sndUsers u
            LEFT JOIN sndUsers r ON u.ReportingToUserID = r.UserID where  u.Status is not Null order by u.[UserID] desc";  // Joining to get the ReportingToUser's EmpName

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error executing query: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $all_sndUsers = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $all_sndUsers[] = $row; // Add each row to the array
    }

    // Check if the array has data
    if (count($all_sndUsers) > 0) {
        // Return the data
        echo json_encode($all_sndUsers);
    } else {
        // No data found
        echo json_encode(["error" => "No users found in the table"]);
    }
}

function get_all_ReportUser($conn, $DesignationID) {
    try {
        // Prepare the SQL statement for the stored procedure
        $sql = "exec sndUpperDesignation ?";

        // Initialize the statement
        $stmt = sqlsrv_prepare($conn, $sql, [$DesignationID]);

        // Check if the statement was prepared successfully
        if ($stmt === false) {
            throw new Exception("Failed to prepare the SQL statement: " . print_r(sqlsrv_errors(), true));
        }

        // Execute the statement
        if (!sqlsrv_execute($stmt)) {
            throw new Exception("Failed to execute the SQL statement: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $results = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = [
                'UserID' => $row['UserID'],
                'ReportUsers' => $row['reportUsers']
            ];
        }

        // Free the statement resource
        sqlsrv_free_stmt($stmt);

        // Return the results
        return $results;
    } catch (Exception $e) {
        // Handle exceptions and log errors
        error_log("Error in get_all_ReportUser: " . $e->getMessage());
        return ["error" => $e->getMessage()];
    }
}




function get_all_reporttoUsers($conn) { 
    $sql = "SELECT u.[UserID], 
       CAST(((select name as CategoryName from HrmDesignations where CmnCompanyId = 2 and name in (select Designation from sndUsers) and HrmDesignations.ID = u.DesignationID)) AS VARCHAR) + ' - ' +  u.[EmpName] + ' - ' + u.EmployeeID  AS reportUsers
FROM sndUsers u
LEFT JOIN sndUsers r ON u.ReportingToUserID = r.UserID where u.Status = 1
order by CAST(((select name as CategoryName from HrmDesignations where CmnCompanyId = 2 and name in (select Designation from sndUsers) and HrmDesignations.ID = u.DesignationID)) AS VARCHAR), u.[EmpName] ";  // Joining to get the ReportingToUser's EmpName

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error executing query: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $all_sndUsers = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $all_sndUsers[] = $row; // Add each row to the array
    }

    // Check if the array has data
    if (count($all_sndUsers) > 0) {
        // Return the data
        echo json_encode($all_sndUsers);
    } else {
        // No data found
        echo json_encode(["error" => "No users found in the table"]);
    }
}

function get_sndUser($conn, $UserID) {
    // Validate input
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

    // SQL query to fetch user details
    $sql = "
        SELECT 
            u.UserID,
            u.EmployeeID,
            u.EmpName,
            u.DesignationID,
			d.Name as Designation,
            u.Username,
            u.Email,
            u.Phone,
            u.Address,
            u.ReportingToUserID,
			(select EmpName from sndUsers sndus where sndus.UserID = u.UserID) as ReportingToUserName,
            u.Status,
            u.Userpicture,
            u.CreatedAt
        FROM 
            sndUsers u
        LEFT JOIN 
            HrmDesignations d ON u.DesignationID = d.ID
        WHERE 
            u.UserID = ?
    ";

    $params = [$UserID];
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error preparing statement: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    if (!sqlsrv_execute($stmt)) {
        echo json_encode(["error" => "Error executing statement: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the result
    $userDetails = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($userDetails === false) {
        echo json_encode(["error" => "No user found for the given UserID"]);
        return;
    }

    // Ensure the image path is returned as a URL if needed
    if (!empty($userDetails['Userpicture'])) {
        $userDetails['Userpicture'] = 'https://asianabpolymer.com/abpolymer/' . $userDetails['Userpicture'];
    }

    // Return the user details in JSON format
    echo json_encode($userDetails);
}


function create_sndUser($conn) {
    // Use $_POST for non-file fields and $_FILES for the file
    if (!isset($_POST['EmpName']) || !isset($_POST['Username']) || !isset($_POST['Phone']) || !isset($_POST['Password'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Handle file upload
    if (isset($_FILES['Userpicture']) && $_FILES['Userpicture']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "userpicture/";
        $fileName = basename($_FILES['Userpicture']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $_POST['EmployeeID'] . '.' . $fileExt;

        // Ensure the directory exists and has write permissions
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Move the file to the target directory
        if (!move_uploaded_file($_FILES['Userpicture']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error uploading user picture"]);
            return;
        }
    } else {
        echo json_encode(["error" => "User picture is missing or invalid"]);
        return;
    }

    // Hash the password using SHA-256
    $hashedPassword = hash('sha256', $_POST['Password']);

    // Insert user into the database
    $sql = "INSERT INTO sndUsers (EmployeeID, EmpName, DesignationID, Username, Password, Userpicture, Email, Phone, Address, ReportingToUserID, Status, CreatedAt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";

    $params = [
        $_POST['EmployeeID'],
        $_POST['EmpName'],
        $_POST['DesignationID'] ?? null,
        $_POST['Username'],
        $hashedPassword,
        $targetFilePath,  // Save the file path in the database
        $_POST['Email'] ?? null,
        $_POST['Phone'],
        $_POST['Address'] ?? null,
        $_POST['ReportingToUserID'] ?? null,
        $_POST['Status'] ?? null
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating user: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "User created successfully"]);
}

function update_sndUserWithoutImage($conn, $UserID) {
    // Validate input
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required."]);
        return;
    }

    // Get JSON data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid JSON input."]);
        return;
    }

    if (!isset($input['EmpName']) || !isset($input['Username']) || !isset($input['Phone'])) {
        echo json_encode(["error" => "Missing required fields."]);
        return;
    }

    // Check for duplicate email
    if (!empty($input['Email'])) {
        $checkEmailSql = "SELECT COUNT(1) AS EmailCount FROM sndUsers WHERE Email = ? AND UserID != ?";
        $checkParams = [$input['Email'], $UserID];
        $checkStmt = sqlsrv_query($conn, $checkEmailSql, $checkParams);

        if ($checkStmt === false) {
            echo json_encode(["error" => "Error checking email: " . print_r(sqlsrv_errors(), true)]);
            return;
        }

        $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);
        if ($row['EmailCount'] > 0) {
            echo json_encode(["error" => "The email is already in use by another user."]);
            return;
        }
    }

    // Hash the password if provided and not empty
    $hashedPassword = null;
    if (!empty($input['Password'])) {
        $hashedPassword = hash('sha256', $input['Password']);
    }

    // Prepare the SQL query
    $sql = "
        UPDATE sndUsers
        SET 
            EmpName = ?, 
            DesignationID = ?, 
            Username = ?, 
            Password = CASE WHEN ? IS NOT NULL THEN ? ELSE Password END, 
            Email = ?, 
            Phone = ?, 
            Address = ?, 
            ReportingToUserID = ?, 
            Status = ?
        WHERE 
            UserID = ?
    ";

    $params = [
        $input['EmpName'],
        $input['DesignationID'] ?? null,
        $input['Username'],
        $hashedPassword, // For CASE WHEN ? IS NOT NULL THEN ?
        $hashedPassword, // For the second placeholder of THEN ?
        $input['Email'] ?? null,
        $input['Phone'],
        $input['Address'] ?? null,
        $input['ReportingToUserID'] ?? null,
        $input['Status'] ?? null,
        $UserID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating user: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "User updated successfully."]);
}


function update_sndUser($conn, $UserID) {
    // Validate input
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required."]);
        return;
    }

    if (!isset($_POST['EmpName']) || !isset($_POST['Username']) || !isset($_POST['Phone'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Initialize file upload variables
    $targetFilePath = null;

    // Handle file upload (if provided)
    if (isset($_FILES['Userpicture']) && $_FILES['Userpicture']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "userpicture/";
        $fileName = basename($_FILES['Userpicture']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $_POST['EmployeeID'] . '.' . $fileExt;

        // Ensure the directory exists and has write permissions
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Move the file to the target directory
        if (!move_uploaded_file($_FILES['Userpicture']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error uploading user picture"]);
            return;
        }
    }

    // Hash the password if provided
    $hashedPassword = null;
    if (!empty($_POST['Password'])) {
        $hashedPassword = hash('sha256', $_POST['Password']);
    }

    // Prepare the SQL query
    $sql = "
        UPDATE sndUsers
        SET 
            EmpName = ?, 
            DesignationID = ?, 
            Username = ?, 
            Password = ISNULL(?, Password), 
            Userpicture = ISNULL(?, Userpicture), 
            Email = ?, 
            Phone = ?, 
            Address = ?, 
            ReportingToUserID = ?, 
            Status = ?
        WHERE 
            UserID = ?
    ";

    $params = [
        $_POST['EmpName'],
        $_POST['DesignationID'] ?? null,
        $_POST['Username'],
        $hashedPassword,
        $targetFilePath,
        $_POST['Email'] ?? null,
        $_POST['Phone'],
        $_POST['Address'] ?? null,
        $_POST['ReportingToUserID'] ?? null,
        $_POST['Status'] ?? null,
        $UserID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating user: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "User updated successfully"]);
}


function update_sndUserStatus($conn, $UserID) {
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['Status'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

  
    // Proceed with update if no duplicate email is found
    $sql = "UPDATE sndUsers SET 
        Status = ?,
        ModifiedAt = GETDATE() 
        WHERE UserID = ?";

    $params = [
        $input['Status'] ?? null,
        $UserID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating user: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "User updated successfully"]);
}



function delete_sndUser($conn, $UserID) {
    $sql = "DELETE FROM sndUsers WHERE UserID = ?";
    $params = [$UserID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting user: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "User deleted successfully"]);
}

// Function to get all production orders
function get_production_orders($conn) {
    $sql = "SELECT * FROM sndProductionOrder";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching production orders: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $productionOrders = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $productionOrders[] = $row;
    }

    echo json_encode($productionOrders);
}

// Function to get a single production order by ID
function get_production_order($conn, $ProductionOrderID) {
    $sql = "SELECT * FROM sndProductionOrder WHERE ProductionOrderID = ?";
    $params = [$ProductionOrderID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching production order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $productionOrder = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($productionOrder) {
        echo json_encode($productionOrder);
    } else {
        echo json_encode(["error" => "Production order not found"]);
    }
}

function generate_new_product_receipt_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "GRN";

    // Query to fetch the latest ProductReceiptNo
    $sqlLastOrder = "SELECT TOP 1 ProductReceiptNo FROM sndProductReceipt ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last product receipt number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['ProductReceiptNo']) && preg_match('/GRN-(\d+)\/\d{2}-\d{2}/', $row['ProductReceiptNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next product receipt number
    $nextNumber = $lastNumber + 1;
    $newProductReceiptNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated product receipt number
    echo json_encode(["NewProductReceiptNo" => $newProductReceiptNo]);
}


function generate_new_money_receipt_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "GRN";

    // Query to fetch the latest MRNo
    $sqlLastOrder = "SELECT TOP 1 MRNo FROM sndMoneyReceipt ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last product receipt number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['MRNo']) && preg_match('/GRN-(\d+)\/\d{2}-\d{2}/', $row['MRNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next product receipt number
    $nextNumber = $lastNumber + 1;
    $newMRNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated product receipt number
    echo json_encode(["NewMRNo" => $newMRNo]);
}


function generate_new_salesorder_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "SO";

    // Query to fetch the latest SalesOrderNo
    $sqlLastOrder = "SELECT TOP 1 SalesOrderNo FROM sndSalesOrders ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last sales order number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['SalesOrderNo']) && preg_match('/SO-(\d+)\/\d{2}-\d{2}/', $row['SalesOrderNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next sales order number
    $nextNumber = $lastNumber + 1;
    $newSalesOrderNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated sales order number
    echo json_encode(["NewSalesOrderNo" => $newSalesOrderNo]);
}

function generate_new_Challan_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "CN";

    // Query to fetch the latest SalesOrderNo
    $sqlLastOrder = "SELECT TOP 1 ChallanNo FROM sndDeliveryChallanMaster ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last sales order number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['ChallanNo']) && preg_match('/SO-(\d+)\/\d{2}-\d{2}/', $row['ChallanNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next sales order number
    $nextNumber = $lastNumber + 1;
    $newChallanNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated sales order number
    echo json_encode(["NewChallanNo" => $newChallanNo]);
}


// Function to create a production order
function create_production_order($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndProductionOrder (ProductionOrderNo, SubmittedByUserID, ProductionOrderDate, FinancialYearID, ProductCategoryID, ProductID, Quantity, 
            ProductionDemandQty, Status, CreatedAt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";
    $params = [
        $data['ProductionOrderNo'], 
        $data['SubmittedByUserID'], 
		$data['ProductionOrderDate'], 
		$data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['Quantity'], 
        $data['ProductionDemandQty'], 
        $data['Status']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Production order created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating production order: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a production order
function update_production_order($conn, $ProductionOrderID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndProductionOrder SET ProductionOrderNo = ?, SubmittedByUserID = ?, ProductionOrderDate = ?, FinancialYearID = ?, ProductCategoryID = ?, ProductID = ?, Quantity = ?, ProductionDemandQty = ?,  Status = ?, 
            ModifiedAt = GETDATE() WHERE ProductionOrderID = ?";
    $params = [
        $data['ProductionOrderNo'], 
        $data['SubmittedByUserID'], 
		$data['ProductionOrderDate'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['Quantity'], 
        $data['ProductionDemandQty'], 
        $data['Status'], 
        $ProductionOrderID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Production order updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating production order: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to delete a production order
function delete_production_order($conn, $ProductionOrderID) {
    $sql = "DELETE FROM sndProductionOrder WHERE ProductionOrderID = ?";
    $params = [$ProductionOrderID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Production order deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting production order: " . print_r(sqlsrv_errors(), true)]);
    }
}

function get_ppreceiptall($conn,$ProductReceiptID) {
    // Check if ProductReceiptID is provided
    if (!isset($_GET['ProductReceiptID']) || empty($_GET['ProductReceiptID'])) {
        echo json_encode(["error" => "Missing ProductReceiptID"]);
        return;
    }

    // Retrieve ProductReceiptID from the request
    $ProductReceiptID = $_GET['ProductReceiptID'];

    // Define the base URL for the ChallanCopyPath
    $baseURL = "https://asianabpolymer.com/abpolymer/uploads/ChallanCopyPath/";

    try {
        // Query to fetch product receipt details
        $sqlReceipt = "
            SELECT 
                pr.ProductReceiptNo,
				convert(char(11),pr.ReceiptDate,120) as ReceiptDate,
                pr.BindingPartyID,
                bp.PartyName AS BindingPartyName,
                pr.PrintEdition,
                pr.ChallanNumber,
                pr.ChallanCopyPath,
                pr.ProductionOrderQty,
                pr.UserID,
                u.EmpName AS CreatedBy,
                pr.CreatedAt,
                pr.ModifiedAt
            FROM 
                sndProductReceipt pr
            LEFT JOIN 
                prdBindingParty bp ON pr.BindingPartyID = bp.BindingPartyID
            LEFT JOIN 
                sndUserView u ON pr.UserID = u.UserID
            WHERE 
                pr.ProductReceiptID = ?";

        // Prepare and execute the main receipt query
        $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, [$ProductReceiptID]);

        if ($stmtReceipt === false) {
            throw new Exception("Error fetching product receipt: " . print_r(sqlsrv_errors(), true));
        }

        $receipt = sqlsrv_fetch_array($stmtReceipt, SQLSRV_FETCH_ASSOC);

        if (!$receipt) {
            echo json_encode(["error" => "No receipt found for the given ProductReceiptID"]);
            return;
        }

        // Add the full URL to the ChallanCopyPath
        if (!empty($receipt['ChallanCopyPath'])) {
            $receipt['ChallanCopyPath'] = $baseURL . basename($receipt['ChallanCopyPath']);
        }

        // Query to fetch receipt details
        $sqlDetails = "
            SELECT ROW_NUMBER() OVER (ORDER BY  prd.ProductReceiptDetailsID) AS SL,
			 prd.ProductReceiptDetailsID,
                prd.ProductReceiptID,
                prd.FinancialYearID,
                prd.ProductCategoryID,
				(SELECT CategoryName FROM sndCategorydata WHERE ID = prd.ProductCategoryID) AS ProductCategoryName,
                prd.ProductID,
                p.ProductName,
                prd.Quantity,
                prd.Rate,
                prd.Total,
				CONCAT(prd.Quantity,' Pcs', ' @ Tk. ', prd.Rate, ' = ', prd.Total) AS RateValue -- Corrected calculation
            FROM 
                sndProductReceiptDetails prd
            LEFT JOIN 
                sndProducts p ON prd.ProductID = p.ProductID
            WHERE 
                prd.ProductReceiptID = ?";

        // Prepare and execute the receipt details query
        $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$ProductReceiptID]);

        if ($stmtDetails === false) {
            throw new Exception("Error fetching product receipt details: " . print_r(sqlsrv_errors(), true));
        }

        // Collect receipt details
        $details = [];
        while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
            $details[] = $row;
        }

        // Combine the receipt and details
        $response = [
            "success" => true,
            "receipt" => $receipt,
            "details" => $details
        ];

        // Send the response as JSON
        echo json_encode($response, JSON_PRETTY_PRINT);
    } catch (Exception $e) {
        // Handle errors and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}


// Function to get all preceipts
function get_preceipts($conn) {
    $sql = "SELECT pr.ProductReceiptID,
    pr.ProductReceiptNo, 
    convert(char(11),pr.ReceiptDate,120) ReceiptDate,
    pr.BindingPartyID, 
    pb.PartyName AS BindingPartyName,
    pr.PrintEdition, 
    pr.FinancialYearID, 
    cty.Name AS FinancialYearName, 
    pr.ProductCategoryID, 
    sc.CategoryName AS ProductCategoryName, 
    pr.ProductID, 
    sp.ProductName, 
    sp.CategoryID AS ProductCategoryID, 
    pr.Quantity, 
    pr.Rate, 
    pr.ChallanNumber
FROM 
    sndProductReceipt pr
LEFT JOIN 
    PrdBindingParty pb ON pr.BindingPartyID = pb.BindingPartyID
LEFT JOIN 
    CmnTransactionalYears cty ON pr.FinancialYearID = cty.id
LEFT JOIN 
    sndCategorydata sc ON pr.ProductCategoryID = sc.id AND sc.CategoryType LIKE 'books-category%'
LEFT JOIN 
    sndProducts sp ON pr.ProductID = sp.ProductID";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching preceipts: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $preceipts = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $preceipts[] = $row;
    }

    echo json_encode($preceipts);
}

// Function to get all preceipts
function get_ppreceipts($conn) {
    $sql = "SELECT 
                pr.ProductReceiptID,
                pr.ProductReceiptNo, 
                CONVERT(CHAR(11), pr.ReceiptDate, 120) AS ReceiptDate,
                pr.BindingPartyID, 
                pb.PartyName AS BindingPartyName,
                pr.PrintEdition, 
                pr.ChallanNumber,
                pr.ChallanCopyPath,
				pr.ProductionOrderQty,
				 CASE 
        WHEN (SELECT COUNT(*) 
              FROM sndProductReceiptDetails 
              WHERE sndProductReceiptDetails.ProductReceiptID = pr.ProductReceiptID) = 0 
        THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus
            FROM 
                sndProductReceipt pr
            LEFT JOIN 
                PrdBindingParty pb ON pr.BindingPartyID = pb.BindingPartyID
            LEFT JOIN 
                CmnTransactionalYears cty ON pr.FinancialYearID = cty.id
            LEFT JOIN 
                sndCategorydata sc ON pr.ProductCategoryID = sc.id AND sc.CategoryType LIKE 'books-category%'
            LEFT JOIN 
                sndProducts sp ON pr.ProductID = sp.ProductID order by pr.ProductReceiptID desc";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipts: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipts = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Modify ChallanCopyPath to include the public URL
        if (!empty($row['ChallanCopyPath'])) {
            $row['ChallanCopyPath'] = $row['ChallanCopyPath'];
        }

        $receipts[] = $row;
    }

    echo json_encode($receipts);
}

// Function to get a single receipt by ID
function get_preceipt($conn, $ProductReceiptID) {
    $sql = "SELECT 
        pr.ProductReceiptNo, 
        convert(char(11),pr.ReceiptDate,120) ReceiptDate,
        pr.BindingPartyID, 
        pb.PartyName AS BindingPartyName,
        pr.PrintEdition, 
        pr.FinancialYearID, 
        cty.Name AS FinancialYearName, 
        pr.ProductCategoryID, 
        sc.CategoryName AS ProductCategoryName, 
        pr.ProductID, 
        sp.ProductName, 
        sp.CategoryID AS ProductCategoryID, 
        pr.Quantity, 
        pr.Rate, 
        pr.ChallanNumber, 
        pr.ChallanCopyPath
    FROM 
        sndProductReceipt pr
    LEFT JOIN 
        PrdBindingParty pb ON pr.BindingPartyID = pb.BindingPartyID
    LEFT JOIN 
        CmnTransactionalYears cty ON pr.FinancialYearID = cty.id
    LEFT JOIN 
        sndCategorydata sc ON pr.ProductCategoryID = sc.id AND sc.CategoryType LIKE 'books-category%'
    LEFT JOIN 
        sndProducts sp ON pr.ProductID = sp.ProductID 
    WHERE 
        pr.ProductReceiptID = ?";
    $params = [$ProductReceiptID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($receipt) {
        // Generate the full URL for the ChallanCopyPath
        if (!empty($receipt['ChallanCopyPath']) && file_exists($receipt['ChallanCopyPath'])) {
            // Replace the local path with the public URL base
            $baseUrl = "https://asianabpolymer.com/abpolymer/";
            $relativePath = str_replace(__DIR__ . "/", "", $receipt['ChallanCopyPath']);
            $receipt['ChallanCopyPath'] = $baseUrl . $relativePath;
        } else {
            // If the file does not exist, set to null or provide a placeholder URL
            $receipt['ChallanCopyPath'] = null; // Or a placeholder like "https://example.com/no-image.jpg"
        }

        echo json_encode($receipt);
    } else {
        echo json_encode(["error" => "Receipt not found"]);
    }
}

// Function to get a single receipt by ID
function get_ppreceipt($conn, $ProductReceiptID) {
    $sql = "SELECT 
        pr.ProductReceiptNo, 
        convert(char(11),pr.ReceiptDate,120) ReceiptDate,
        pr.BindingPartyID, 
        pb.PartyName AS BindingPartyName,
        pr.PrintEdition, 
        pr.ChallanNumber, 
        pr.ChallanCopyPath
    FROM 
        sndProductReceipt pr
    LEFT JOIN 
        PrdBindingParty pb ON pr.BindingPartyID = pb.BindingPartyID
    LEFT JOIN 
        CmnTransactionalYears cty ON pr.FinancialYearID = cty.id
    LEFT JOIN 
        sndCategorydata sc ON pr.ProductCategoryID = sc.id AND sc.CategoryType LIKE 'books-category%'
    LEFT JOIN 
        sndProducts sp ON pr.ProductID = sp.ProductID 
    WHERE 
        pr.ProductReceiptID = ?";
    $params = [$ProductReceiptID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($receipt) {
        // Generate the full URL for the ChallanCopyPath
        if (!empty($receipt['ChallanCopyPath']) && file_exists($receipt['ChallanCopyPath'])) {
            // Replace the local path with the public URL base
            $baseUrl = "https://asianabpolymer.com/abpolymer/";
            $relativePath = str_replace(__DIR__ . "/", "", $receipt['ChallanCopyPath']);
            $receipt['ChallanCopyPath'] = $baseUrl . $relativePath;
        } else {
            // If the file does not exist, set to null or provide a placeholder URL
            $receipt['ChallanCopyPath'] = null; // Or a placeholder like "https://example.com/no-image.jpg"
        }

        echo json_encode($receipt);
    } else {
        echo json_encode(["error" => "Receipt not found"]);
    }
}

// Function to create a receipt
function create_preceipt($conn) {
    // Ensure the request uses POST method and required fields are present
    $requiredFields = ['ProductReceiptNo', 'ReceiptDate', 'BindingPartyID', 'ChallanNumber'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            echo json_encode(["error" => "Missing required field: $field"]);
            return;
        }
    }

    // Initialize variables
    $data = $_POST;
    $targetFilePath = null;

    // Handle file upload
    if (isset($_FILES['ChallanCopyPath']) && $_FILES['ChallanCopyPath']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/ChallanCopyPath/";
        $fileName = basename($_FILES['ChallanCopyPath']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $data['ChallanNumber'] . '.' . $fileExt;

        // Ensure the directory exists and has write permissions
        if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true)) {
            echo json_encode(["error" => "Failed to create directory for file upload"]);
            return;
        }

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['ChallanCopyPath']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error uploading ChallanCopyPath"]);
            return;
        }
    } else {
        echo json_encode(["error" => "ChallanCopyPath is missing or invalid"]);
        return;
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO sndProductReceipt (
           ProductReceiptNo, ReceiptDate, BindingPartyID, PrintEdition,
           FinancialYearID, ProductCategoryID, ProductID, Quantity, 
           Rate, ChallanNumber, ChallanCopyPath, ProductionOrderQty, 
           UserID, CreatedAt) 
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";

    $params = [
        $data['ProductReceiptNo'],
        $data['ReceiptDate'],
        $data['BindingPartyID'],
        $data['PrintEdition'] ?? null,
        $data['FinancialYearID'] ?? null,
        $data['ProductCategoryID'] ?? null,
        $data['ProductID'] ?? null,
        $data['Quantity'] ?? null,
        $data['Rate'] ?? null,
        $data['ChallanNumber'],
        $targetFilePath,
        $data['ProductionOrderQty'] ?? null, // Optional field handled
        $data['UserID'] ?? null,
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt) {
        echo json_encode(["success" => "Product receipt created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating product receipt", "details" => sqlsrv_errors()]);
    }
}

// Function to create a receipt
function create_ppreceipt($conn) {
    try {
        // Ensure the request uses POST method and required fields are present
        $requiredFields = ['ProductReceiptNo', 'ReceiptDate', 'BindingPartyID', 'ChallanNumber'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                throw new Exception("Missing required field: $field");
            }
        }

        // Initialize variables
        $data = $_POST;
        $targetFilePath = null;

        // Handle file upload
        if (isset($_FILES['ChallanCopyPath']) && $_FILES['ChallanCopyPath']['error'] === UPLOAD_ERR_OK) {
            $targetDir = __DIR__ . "/uploads/ChallanCopyPath/";
            $fileName = uniqid("Challan_") . '.' . pathinfo($_FILES['ChallanCopyPath']['name'], PATHINFO_EXTENSION);
            $targetFilePath = $targetDir . $fileName;

            // Ensure the directory exists
            if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true)) {
                throw new Exception("Failed to create directory for file upload");
            }

            // Move the uploaded file
            if (!move_uploaded_file($_FILES['ChallanCopyPath']['tmp_name'], $targetFilePath)) {
                throw new Exception("Error uploading ChallanCopyPath");
            }

            // Generate URL for the uploaded file
            $fileURL = "https://asianabpolymer.com/abpolymer/uploads/ChallanCopyPath/" . $fileName;
        } else {
            throw new Exception("ChallanCopyPath is missing or invalid");
        }

        // SQL query to insert data into the database
        $sql = "INSERT INTO sndProductReceipt (
                   ProductReceiptNo, ReceiptDate, BindingPartyID, PrintEdition,
                   ChallanNumber, ChallanCopyPath, ProductionOrderQty, 
                   UserID, CreatedAt
               ) OUTPUT INSERTED.ProductReceiptID
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";

        $params = [
            $data['ProductReceiptNo'],
            $data['ReceiptDate'],
            $data['BindingPartyID'],
            $data['PrintEdition'] ?? null,
            $data['ChallanNumber'],
            $fileURL, // Use the file URL instead of the local path
            $data['ProductionOrderQty'] ?? null,
            $data['UserID'] ?? null,
        ];

        // Execute the query and fetch the ProductReceiptID
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            throw new Exception("Error creating product receipt: " . print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductReceiptID'])) {
            throw new Exception("Failed to fetch ProductReceiptID");
        }

        $ProductReceiptID = $row['ProductReceiptID'];

        // Return success response
        echo json_encode([
            "message" => "Product receipt and details created successfully",
            "ProductReceiptID" => $ProductReceiptID,
            "ChallanCopyPath" => $fileURL,
        ]);
    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "error" => $e->getMessage()
        ]);
    }
}

function create_ppreceiptall($conn) {
    // Validate required fields
    if (
        empty($_POST['ProductReceiptNo']) || 
        empty($_POST['ReceiptDate']) || 
        empty($_POST['BindingPartyID']) || 
        empty($_POST['ProductionOrderQty']) || 
        empty($_POST['UserID'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Initialize variables
    $challanCopyPath = null;

    // Handle file upload for ChallanCopyPath
    if (isset($_FILES['ChallanCopyPath']) && $_FILES['ChallanCopyPath']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/ChallanCopyPath/";
        $fileName = uniqid("Challan_", true) . "." . pathinfo($_FILES['ChallanCopyPath']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        // Ensure the directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
                echo json_encode(["error" => "Failed to create directory for file upload"]);
                return;
            }
        }

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['ChallanCopyPath']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving Challan Copy"]);
            return;
        }

        // Set the relative path to save in the database
        $challanCopyPath = 'https://asianabpolymer.com/abpolymer/uploads/ChallanCopyPath/' . $fileName;
    }

    // SQL query to insert the receipt data
    $sqlReceipt = "
        INSERT INTO [dbo].[sndProductReceipt]
            ([ProductReceiptNo], [ReceiptDate], [BindingPartyID], 
            [PrintEdition], [ChallanNumber], [ChallanCopyPath], 
            [ProductionOrderQty], [UserID], [CreatedAt], [ModifiedAt])
        OUTPUT INSERTED.ProductReceiptID
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE());
    ";

    // Prepare input data
    $paramsReceipt = [
        $_POST['ProductReceiptNo'],
        $_POST['ReceiptDate'],
        $_POST['BindingPartyID'],
        $_POST['PrintEdition'] ?? null,
        $_POST['ChallanNumber'] ?? null,
        $challanCopyPath,
        $_POST['ProductionOrderQty'],
        $_POST['UserID']
    ];

    // Execute the query
    $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, $paramsReceipt);

    // Check if the query executed successfully
    if ($stmtReceipt === false) {
        echo json_encode(["error" => "Error creating product receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the inserted ProductReceiptID
    $row = sqlsrv_fetch_array($stmtReceipt, SQLSRV_FETCH_ASSOC);
    $ProductReceiptID = $row['ProductReceiptID'] ?? null;

    // Check if ProductReceiptID is valid
    if (is_null($ProductReceiptID)) {
        echo json_encode(["error" => "ProductReceiptID is null. Check if the insert was successful."]);
        return;
    }

    // Insert receipt details if provided
    if (isset($_POST['Details']) && is_array($_POST['Details']) && !empty($_POST['Details'])) {
        foreach ($_POST['Details'] as $detail) {
            // Skip insertion if required fields are missing
            if (
                empty($detail['FinancialYearID']) || 
                empty($detail['ProductCategoryID']) || 
                empty($detail['ProductID']) || 
                empty($detail['Quantity']) || 
                empty($detail['Rate'])
            ) {
                continue;
            }

            $detailSql = "
                INSERT INTO [dbo].[sndProductReceiptDetails]
                    ([ProductReceiptID], [FinancialYearID], [ProductCategoryID], 
                    [ProductID], [Quantity], [Rate], [Total])
                VALUES (?, ?, ?, ?, ?, ?, ?);
            ";
            $detailParams = [
                $ProductReceiptID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Rate'],
                $detail['Quantity'] * $detail['Rate'] // Calculate Total
            ];

            $detailStmt = sqlsrv_query($conn, $detailSql, $detailParams);

            // Log errors for details insertion
            if ($detailStmt === false) {
                error_log("Error inserting product receipt details: " . print_r(sqlsrv_errors(), true));
            }
        }
    }

    // Return success response
    echo json_encode([
        "message" => "Product receipt and details created successfully",
        "ProductReceiptID" => $ProductReceiptID,
        "ChallanCopyPath" => $challanCopyPath
    ]);
}

function update_ppreceiptall($conn, $ProductReceiptID) {
    // Validate required fields
    $data = json_decode(file_get_contents("php://input"), true);

    if (
        empty($ProductReceiptID) ||
        empty($data['ProductReceiptNo']) ||
        empty($data['ReceiptDate']) ||
        empty($data['BindingPartyID']) ||
        empty($data['ProductionOrderQty']) ||
        empty($data['UserID'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // SQL query to update the receipt data
    $sqlReceipt = "
        UPDATE [dbo].[sndProductReceipt]
        SET 
            [ProductReceiptNo] = ?,
            [ReceiptDate] = ?,
            [BindingPartyID] = ?,
            [PrintEdition] = ?,
            [ChallanNumber] = ?,
            [ProductionOrderQty] = ?,
            [ModifiedAt] = GETDATE()
        WHERE [ProductReceiptID] = ?;
    ";

    // Prepare input data
    $paramsReceipt = [
        $data['ProductReceiptNo'],
        $data['ReceiptDate'],
        $data['BindingPartyID'],
        $data['PrintEdition'] ?? null,
        $data['ChallanNumber'] ?? null,
        $data['ProductionOrderQty'],
        $ProductReceiptID
    ];

    // Execute the query
    $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, $paramsReceipt);

    // Check if the query executed successfully
    if ($stmtReceipt === false) {
        echo json_encode(["error" => "Error updating product receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Update receipt details if provided
    if (isset($data['Details']) && is_array($data['Details']) && !empty($data['Details'])) {
        foreach ($data['Details'] as $detail) {
            // Skip update if required fields are missing
            if (
                empty($detail['ProductReceiptDetailsID']) ||
                empty($detail['FinancialYearID']) || 
                empty($detail['ProductCategoryID']) || 
                empty($detail['ProductID']) || 
                empty($detail['Quantity']) || 
                empty($detail['Rate'])
            ) {
                continue;
            }

            $detailSql = "
                UPDATE [dbo].[sndProductReceiptDetails]
                SET 
                    [FinancialYearID] = ?,
                    [ProductCategoryID] = ?,
                    [ProductID] = ?,
                    [Quantity] = ?,
                    [Rate] = ?,
                    [Total] = ?
                WHERE [ProductReceiptDetailsID] = ?;
            ";

            $detailParams = [
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Rate'],
                $detail['Quantity'] * $detail['Rate'], // Calculate Total
                $detail['ProductReceiptDetailsID']
            ];

            $detailStmt = sqlsrv_query($conn, $detailSql, $detailParams);

            // Log errors for details update
            if ($detailStmt === false) {
                error_log("Error updating product receipt details: " . print_r(sqlsrv_errors(), true));
            }
        }
    }

    // Return success response
    echo json_encode(["message" => "Product receipt and details updated successfully"]);
}



function update_preceiptfile($conn, $ProductReceiptID) {
    try {
        // Validate ProductReceiptID
        if (!is_numeric($ProductReceiptID)) {
            echo json_encode(["error" => "Invalid ProductReceiptID"]);
            return;
        }

        // Check if a file is uploaded
        if (!isset($_FILES['ChallanCopyPath']) || $_FILES['ChallanCopyPath']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(["error" => "No file uploaded or upload error"]);
            return;
        }

        // Directory for storing files
        $targetDir = __DIR__ . "/ChallanCopyPath/";

        // Ensure directory exists
        if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true)) {
            echo json_encode(["error" => "Failed to create directory for file uploads"]);
            return;
        }

        // Get current ChallanCopyPath from the database
        $sqlSelect = "SELECT ChallanCopyPath FROM sndProductReceipt WHERE ProductReceiptID = ?";
        $stmtSelect = sqlsrv_query($conn, $sqlSelect, [$ProductReceiptID]);
        if ($stmtSelect === false) {
            echo json_encode(["error" => "Error fetching existing file path: " . print_r(sqlsrv_errors(), true)]);
            return;
        }

        $existingFile = sqlsrv_fetch_array($stmtSelect, SQLSRV_FETCH_ASSOC);
        $currentFilePath = $existingFile['ChallanCopyPath'] ?? null;

        // Delete the existing file if it exists
        if ($currentFilePath && file_exists(__DIR__ . "/" . $currentFilePath)) {
            unlink(__DIR__ . "/" . $currentFilePath);
        }

        // Handle the new file upload
        $fileName = basename($_FILES['ChallanCopyPath']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = "CN" . uniqid() . '.' . $fileExt; // Generate a unique file name
        $targetFilePath = $targetDir . $newFileName;

        if (!move_uploaded_file($_FILES['ChallanCopyPath']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Failed to upload ChallanCopyPath"]);
            return;
        }

        // Update the database with the new file path
        $newFilePathDb = "ChallanCopyPath/" . $newFileName;
        $sqlUpdate = "UPDATE sndProductReceipt SET ChallanCopyPath = ?, ModifiedAt = GETDATE() WHERE ProductReceiptID = ?";
        $stmtUpdate = sqlsrv_query($conn, $sqlUpdate, [$newFilePathDb, $ProductReceiptID]);

        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Error updating file path in database: " . print_r(sqlsrv_errors(), true)]);
            return;
        }

        // Success response
        echo json_encode(["success" => "Product receipt file updated successfully", "ChallanCopyPath" => $newFilePathDb]);

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}


// Function to delete a receipt
function delete_preceipt($conn, $ProductReceiptID) {
    $sql = "DELETE FROM sndProductReceipt WHERE ProductReceiptID = ?";
    $params = [$ProductReceiptID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Product receipt deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting product receipt: " . print_r(sqlsrv_errors(), true)]);
    }
}


// Function to get all transfers
function get_transfers($conn) {
    $sql = "SELECT * FROM sndInventoryProductTransfer";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching transfers: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $transfers = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $transfers[] = $row;
    }

    echo json_encode($transfers);
}

// Function to get a single transfer by ID
function get_transfer($conn, $TransferID) {
    $sql = "SELECT * FROM sndInventoryProductTransfer WHERE TransferID = ?";
    $params = [$TransferID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching transfer: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $transfer = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($transfer) {
        echo json_encode($transfer);
    } else {
        echo json_encode(["error" => "Transfer not found"]);
    }
}

// Function to create a transfer
function create_transfer($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndInventoryProductTransfer (FromPartyID, ToPartyID, FinancialYearID, ProductCategoryID, ProductID, Quantity, TransferDate, PerformedByUserID, CreatedAt, ModifiedAt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE())";
    $params = [
        $data['FromPartyID'], 
        $data['ToPartyID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['Quantity'], 
        $data['TransferDate'], 
        $data['PerformedByUserID']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Transfer created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating transfer: " . print_r(sqlsrv_errors(), true)]);
    }
}

// Function to update a transfer
function update_transfer($conn, $TransferID) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "UPDATE sndInventoryProductTransfer SET FromPartyID = ?, ToPartyID = ?, FinancialYearID = ?, ProductCategoryID = ?, ProductID = ?, Quantity = ?, TransferDate = ?, PerformedByUserID = ?, ModifiedAt = GETDATE() 
            WHERE TransferID = ?";
    $params = [
        $data['FromPartyID'], 
        $data['ToPartyID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['Quantity'], 
        $data['TransferDate'], 
        $data['PerformedByUserID'], 
        $TransferID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Transfer updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating transfer: " . print_r(sqlsrv_errors(), true)]);
    }
}


?>
