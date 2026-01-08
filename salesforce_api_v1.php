
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
		
        if ($action == 'get_challansOrder_users' && isset($_GET['UserID'])) {
            get_challansOrder_users($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_ChallanOrderDetails' && isset($_GET['ChallanID'])) {
            get_ChallanOrderDetails($conn, $_GET['ChallanID']);
        } else 

        if ($action == 'get_ChallanToInvoice' && isset($_GET['ChallanID'])) {
            get_ChallanToInvoice($conn, $_GET['ChallanID']);
        } else 

        

       if ($action == 'get_InvoiceOrderDetails' && isset($_GET['InvoiceID'])) {
            get_InvoiceOrderDetails($conn, $_GET['InvoiceID']);
        } else 

		if ($action == 'get_challansSpecimen') {
            get_challansSpecimen($conn);
        } else 	

        if ($action == 'get_challansSpecimen_users' && isset($_GET['UserID'])) {
            get_challansSpecimen_users($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_productSpecimenQty' && isset($_GET['FinancialYearID']) && isset($_GET['ProductID']) && isset($_GET['SpecimenUserID'])) {
            get_productSpecimenQty($conn, $_GET['FinancialYearID'], $_GET['ProductID'], $_GET['SpecimenUserID']);
        } else 

		if ($action == 'get_challan' && isset($_GET['ChallanID'])) {
            get_challan($conn, $_GET['ChallanID']);
        } else 
       
		if ($action == 'get_invoiceSalesOrder') {
            get_invoiceSalesOrder($conn);
        } else 

        if ($action == 'get_invoiceSalesOrder_users' && isset($_GET['UserID'])) {
            get_invoiceSalesOrder_users($conn, $_GET['UserID']);
        } else 
        
        if ($action == 'get_invoiceSpecimenOrder') {
            get_invoiceSpecimenOrder($conn);
        } else 

        if ($action == 'get_invoiceSpecimenOrder_users' && isset($_GET['UserID'])) {
            get_invoiceSpecimenOrder_users($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_salesordersInvoice') {
            get_salesordersInvoice($conn);
        } else

        if ($action == 'get_specimenordersInvoice') {
            get_specimenordersInvoice($conn);
        } else
        
        if ($action == 'get_invoice' && isset($_GET['InvoiceID'])) {
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
        } else if ($action == 'get_moneyreceipts_users' && isset($_GET['UserID'])) {
            get_moneyreceipts_users($conn, $_GET['UserID']);

        } else if ($action == 'get_moneyreceipt' && isset($_GET['MRID'])) {
            get_moneyreceipt($conn, $_GET['MRID']);


        } else if ($action == 'get_MoneyReceiptCompleteRejectCancelled' && isset($_GET['UserID'])) {
            get_MoneyReceiptCompleteRejectCancelled($conn, $_GET['UserID']);

        } else if ($action == 'get_MoneyReceiptComplete' && isset($_GET['UserID'])) {
            get_MoneyReceiptComplete($conn, $_GET['UserID']);

        } else if ($action == 'get_MoneyReceiptReject' && isset($_GET['UserID'])) {
            get_MoneyReceiptReject($conn, $_GET['UserID']);

        } else if ($action == 'get_MoneyReceiptCancelled' && isset($_GET['UserID'])) {
            get_MoneyReceiptCancelled($conn, $_GET['UserID']);

        } else if ($action == 'get_MoneyReceiptApproval' && isset($_GET['UserID'])) {
            get_MoneyReceiptApproval($conn, $_GET['UserID']);
        } else 
			
		if ($action == 'get_PaymentMethod') {
            get_PaymentMethod($conn);
        } else
        if ($action == 'get_PaymentMethodCash' && isset($_GET['PaymentMethodID'])) {
            get_PaymentMethodCash($conn, $_GET['PaymentMethodID']);
        } else
		if ($action == 'get_salesorders') {
            get_salesorders($conn);
        } else if ($action == 'get_specimenorders') {
            get_specimenorders($conn);
        } else if ($action == 'get_order' && isset($_GET['SalesOrderID'])) {
            get_order($conn, $_GET['SalesOrderID']);

        } else 

        if ($action == 'get_specimenorders_users' && isset($_GET['UserID'])) {
            get_specimenorders_users($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_salesorders_users' && isset($_GET['UserID'])) {
            get_salesorders_users($conn, $_GET['UserID']);
        } else 
        
        if ($action == 'get_orderforchallan' && isset($_GET['SalesOrderID'])) {
            get_orderforchallan($conn, $_GET['SalesOrderID']);
        } else 
        
        if ($action == 'get_orderforInvoice' && isset($_GET['SalesOrderID'])) {
            get_orderforInvoice($conn, $_GET['SalesOrderID']);
        } else 
        
        if ($action == 'get_specimenordersChallan') {
            get_specimenordersChallan($conn);
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

        } else if ($action == 'get_salesordersComplete' && isset($_GET['UserID'])) {
            get_salesordersComplete($conn, $_GET['UserID']);

        } else if ($action == 'get_salesordersReject' && isset($_GET['UserID'])) {
            get_salesordersReject($conn, $_GET['UserID']);

        } else if ($action == 'get_salesordersCancelled' && isset($_GET['UserID'])) {
            get_salesordersCancelled($conn, $_GET['UserID']);

		} else if ($action == 'get_salesordersSpecemenApproval' && isset($_GET['UserID'])) {
            get_salesordersSpecemenApproval($conn, $_GET['UserID']);
        } else if ($action == 'get_salesordersSpecemanCompleteRejectCancelled' && isset($_GET['UserID'])) {
            get_salesordersSpecemanCompleteRejectCancelled($conn, $_GET['UserID']);	

        } else if ($action == 'get_salesordersSpecemanComplete' && isset($_GET['UserID'])) {
            get_salesordersSpecemanComplete($conn, $_GET['UserID']);	
			
        } else if ($action == 'get_salesordersSpecemanReject' && isset($_GET['UserID'])) {
            get_salesordersSpecemanReject($conn, $_GET['UserID']);	
			
        } else if ($action == 'get_salesordersSpecemanCancelled' && isset($_GET['UserID'])) {
            get_salesordersSpecemanCancelled($conn, $_GET['UserID']);	
			    

        } else if ($action == 'get_salesordersChallan') {
            get_salesordersChallan($conn);
        } else

        if ($action == 'get_all_userslog') {
            get_all_userslog($conn);
        } else
		
		if ($action == 'get_visit_plans') {
            get_all_visit_plans($conn);
        } else 

        if ($action == 'get_VisitEntryApprovalSum' && isset($_GET['UserID'])) {
            get_VisitEntryApprovalSum($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_visit_plan' && isset($_GET['VisitPlanID'])) {
            get_visit_plan($conn, $_GET['VisitPlanID']);

         

        } else if ($action == 'get_VisitPlanApprovalSum' && isset($_GET['UserID'])) {
            get_VisitPlanApprovalSum($conn, $_GET['UserID']);

        } else if ($action == 'get_all_visit_plans_users' && isset($_GET['UserID'])) {
            get_all_visit_plans_users($conn, $_GET['UserID']);
            
        } else  if ($action == 'get_visit_entryall' && isset($_GET['VisitPlanID'])) {
            get_visit_entryall($conn, $_GET['VisitPlanID']);
		
        } else  if ($action == 'profileview' && isset($_GET['UserID'])) {
            profileview($conn, $_GET['UserID']);

		} else  if ($action == 'get_visit_entryforApproval' && isset($_GET['VisitPlanID'])) {
            get_visit_entryforApproval($conn, $_GET['VisitPlanID']);		
			
        } else if ($action == 'get_VisitPlanApproval' && isset($_GET['UserID'])) {
            get_VisitPlanApproval($conn, $_GET['UserID']);    
        
         } else if ($action == 'get_VisitPlanApprovalnew' && isset($_GET['UserID'])) {
            get_VisitPlanApprovalnew($conn, $_GET['UserID']);    
		
		} else if ($action == 'get_VisitPlanEntryApproval' && isset($_GET['UserID'])) {
            get_VisitPlanEntryApproval($conn, $_GET['UserID']);    

	} else if ($action == 'get_VisitPlanEntryApprovalnew' && isset($_GET['UserID'])  && isset($_GET['VisitUserID'])) {
            get_VisitPlanEntryApprovalnew($conn, $_GET['UserID'],$_GET['VisitUserID'] );   

		} else if ($action == 'get_VisitPlanEntryApprovalComplete' && isset($_GET['UserID'])) {
            get_VisitPlanEntryApprovalComplete($conn, $_GET['UserID']);   
			
		} else if ($action == 'get_VisitPlanEntryApprovalReject' && isset($_GET['UserID'])) {
            get_VisitPlanEntryApprovalReject($conn, $_GET['UserID']); 
			
		} else if ($action == 'get_VisitPlanEntryApprovalCancelled' && isset($_GET['UserID'])) {
            get_VisitPlanEntryApprovalCancelled($conn, $_GET['UserID']); 
			
        } else if ($action == 'get_VisitPlanCompleteRejectCancelled' && isset($_GET['UserID'])) {
            get_VisitPlanCompleteRejectCancelled($conn, $_GET['UserID']);     
            
        } else if ($action == 'get_VisitPlanComplete' && isset($_GET['UserID'])) {
            get_VisitPlanComplete($conn, $_GET['UserID']);     
            
        } else if ($action == 'get_VisitPlanCancelled' && isset($_GET['UserID'])) {
            get_VisitPlanCancelled($conn, $_GET['UserID']);     
            

        } else if ($action == 'get_VisitPlanCompleteList' && isset($_GET['UserID'])) {
            get_VisitPlanCompleteList($conn, $_GET['UserID']);
        } else if ($action == 'get_VisitPlanCompleteEntryList' && isset($_GET['UserID'])) {
            get_VisitPlanCompleteEntryList($conn, $_GET['UserID']);
        } else 

		
		if ($action == 'get_visit_entries') {
            get_all_visit_entries($conn);
        } else if ($action == 'get_visit_entry' && isset($_GET['VisitPlanID'])) {
            get_visit_entry($conn, $_GET['VisitPlanID']);
        } else 

        if ($action == 'get_visit_planDetails' && isset($_GET['VisitPlanID'])) {
            get_visit_planDetails($conn, $_GET['VisitPlanID']);
        } else 

        if ($action == 'get_all_notifications' && isset($_GET['UserID'])) {
            get_all_notifications($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_Notification' && isset($_GET['NotificationID'])) {
            get_Notification($conn, $_GET['NotificationID']);
        } else 

        if ($action == 'get_NotificationNo' && isset($_GET['UserID'])) {
            get_NotificationNo($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_notifications' && isset($_GET['UserID']) && isset($_GET['sndNotificationsID'])) {
            get_notifications($conn, $_GET['UserID'], $_GET['sndNotificationsID']);
        } else 

		if ($action == 'get_institutions' && isset($_GET['UserID'])) {
            get_all_institutions($conn, $_GET['UserID']);
        } else 
        
        if ($action == 'get_all_institutions_page' && isset($_GET['UserID']) && isset($_GET['page']) && isset($_GET['limit'])) {
            get_all_institutions_page($conn, $_GET['UserID'] , $_GET['page'] , $_GET['limit']);
        } else 

        if ($action == 'get_institution' && isset($_GET['institutionID'])) {
            get_institution($conn, $_GET['institutionID']);
        } else if ($action == 'Get_InstitutionTeacherDesigMobile' && isset($_GET['InstitutionDetailsID'])) {
            Get_InstitutionTeacherDesigMobile($conn, $_GET['InstitutionDetailsID']);
        } else 

        if ($action == 'get_institutionTeacher' && isset($_GET['InstitutionID'])) {
            get_institutionTeacher($conn, $_GET['InstitutionID']);
        } else 

        if ($action == 'get_PartyContact' && isset($_GET['PartyID'])) {
            get_PartyContact($conn, $_GET['PartyID']);
        } else 

        if ($action == 'get_visit_plan_TeacherBooks' && isset($_GET['VisitPlanID'])) {
            get_visit_plan_TeacherBooks($conn, $_GET['VisitPlanID']);
        } else 

        if ($action == 'get_visit_plan_Teacher_TADA' && isset($_GET['VisitPlanID'])) {
            get_visit_plan_Teacher_TADA($conn, $_GET['VisitPlanID']);
        } else 

        

        if ($action == 'get_visit_plan_TADA_details' && isset($_GET['VisitPlanID'])) {
            get_visit_plan_TADA_details($conn, $_GET['VisitPlanID']);
        } else 

        if ($action == 'get_InstitutionList') {
            get_InstitutionList($conn);
        } else

        if ($action == 'get_institutionName' && isset($_GET['InstitutionTypeID'])) {
            get_institutionName($conn, $_GET['InstitutionTypeID']);
        } else 

        if ($action == 'get_institutionNameUsers' && isset($_GET['InstitutionTypeID']) && isset($_GET['UserID'])) {
            get_institutionNameUsers($conn, $_GET['InstitutionTypeID'], $_GET['UserID']);
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
			
		if ($action == 'get_NumberToWord' && isset($_GET['Number'])) {
            get_NumberToWord($conn, $_GET['Number']);
        } else
	
	
	if ($action == 'get_salesordersAutorizationMIS' && isset($_GET['SalesOrderID'])) {
            get_salesordersAutorizationMIS($conn, $_GET['SalesOrderID']);
        } else

        if ($action == 'get_salesordersAutorizationMISReturn' && isset($_GET['SalesOrderID'])) {
            get_salesordersAutorizationMISReturn($conn, $_GET['SalesOrderID']);
        } else

        if ($action == 'get_user_statistics_institution_visit' && isset($_GET['UserID']) && isset($_GET['InstitutionTypeID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_institution_visit($conn, $_GET['UserID'] ,$_GET['InstitutionTypeID'] , $_GET['date1'] , $_GET['date2']);

        } else

         if ($action == 'get_user_statistics_institution_visit_team' && isset($_GET['UserID']) && isset($_GET['InstitutionTypeID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_institution_visit_team($conn, $_GET['UserID'] ,$_GET['InstitutionTypeID'] , $_GET['date1'] , $_GET['date2']);

        } else

        if ($action == 'get_user_statistics_party_visit' && isset($_GET['UserID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_party_visit($conn, $_GET['UserID'] , $_GET['date1'] , $_GET['date2']);
        } else

        if ($action == 'get_user_statistics_party_visit_team' && isset($_GET['UserID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_party_visit_team($conn, $_GET['UserID'] , $_GET['date1'] , $_GET['date2']);
        } else

        if ($action == 'get_user_statistics_expense_visit' && isset($_GET['UserID']) && isset($_GET['ExpenseID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_expense_visit($conn, $_GET['UserID'] , $_GET['ExpenseID'] , $_GET['date1'] , $_GET['date2']);
        } else

             if ($action == 'get_user_statistics_expense_visit_team' && isset($_GET['UserID']) && isset($_GET['ExpenseID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_expense_visit_team($conn, $_GET['UserID'] , $_GET['ExpenseID'] , $_GET['date1'] , $_GET['date2']);
        } else

        if ($action == 'get_user_statistics' && isset($_GET['UserID'])) {
            get_user_statistics($conn, $_GET['UserID']);
        } else

        if ($action == 'get_user_statistics_date' && isset($_GET['UserID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_date($conn, $_GET['UserID'] , $_GET['date1'] , $_GET['date2']);
        } else

         if ($action == 'get_user_statistics_team_date' && isset($_GET['UserID']) && isset($_GET['date1'])  && isset($_GET['date2'])) {
            get_user_statistics_team_date($conn, $_GET['UserID'], $_GET['date1'] , $_GET['date2']);
        } else
	

        if ($action == 'get_user_statistics_team' && isset($_GET['UserID'])) {
            get_user_statistics_team($conn, $_GET['UserID']);
        } else

		if ($action == 'get_demand_collections') {
            get_all_demand_collections($conn);
        } else if ($action == 'get_demand_collection' && isset($_GET['DemandID'])) {
            get_demand_collection($conn, $_GET['DemandID']);
        } else 
		
		if ($action == 'get_sndUsers' && !isset($_GET['UserID'])) {
			get_all_sndUsers($conn); // Fetch all users
		} else 
			
		if ($action == 'get_sndUsers_web' && !isset($_GET['UserID'])) {
			get_all_sndUsers_web($conn); // Fetch all users
		} else 
		
		if ($action == 'get_sndUser' && isset($_GET['UserID'])) {
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
        } else 
        
        if ($action == 'get_regiontype' && isset($_GET['ID'])) {
            get_regiontype($conn, $_GET['ID']);
        } else 


        if ($action == 'get_allparticulars') {
            get_allparticulars($conn);
        } else 

        if ($action == 'get_particulars' && isset($_GET['ParticularsID'])) {
            get_particulars($conn, $_GET['ParticularsID']);
        } else 
			
		if ($action == 'get_regiontype1') {
            get_all_regiontype($conn);
        } else 

        if ($action == 'get_BDExpReqs') {
            get_BDExpReqs($conn);
        } else 

        if ($action == 'get_BDExpReqs_users'  && isset($_GET['UserID'])) {
            get_BDExpReqs_users($conn, $_GET['UserID']);
        } else 
        
        if ($action == 'get_BDExpReqAll'  && isset($_GET['BDExpReqID'])) {
            get_BDExpReqAll($conn, $_GET['BDExpReqID']);
        } else 
        	
        if ($action == 'get_BDExpReq'  && isset($_GET['BDExpReqID'])) {
            get_BDExpReq($conn, $_GET['BDExpReqID']);
        } else 

        if ($action == 'get_BDExpReqDetails'  && isset($_GET['BDExpReqDetailsID'])) {
            get_BDExpReqDetails($conn, $_GET['BDExpReqDetailsID']);
        } else 

        if ($action == 'get_BDExpReqApproval'  && isset($_GET['UserID'])) {
            get_BDExpReqApproval($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_BDExpReqCompleteRejectCancelled'  && isset($_GET['UserID'])) {
            get_BDExpReqCompleteRejectCancelled($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_BDExpReqComplete'  && isset($_GET['UserID'])) {
            get_BDExpReqComplete($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_BDExpReqReject'  && isset($_GET['UserID'])) {
            get_BDExpReqReject($conn, $_GET['UserID']);
        } else 

        if ($action == 'get_BDExpReqCancelled'  && isset($_GET['UserID'])) {
            get_BDExpReqCancelled($conn, $_GET['UserID']);
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
			
		if ($action == 'get_ThansportMedias') {
            get_all_ThansportMedia($conn);
        } else if ($action == 'get_ThansportMedia' && isset($_GET['ThansportMediaID'])) {
            get_ThansportMedia($conn, $_GET['ThansportMediaID']);
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
        } else 

        if ($action == 'get_PReturns') {
            get_PReturns($conn);
        } else 
			
		 if ($action == 'get_PTransfers') {
            get_PTransfers($conn);
        } else 
		
		if ($action == 'get_Transferall' && isset($_GET['ProductTransferID'])) {
            get_Transferall($conn, $_GET['ProductTransferID']);
        } else	
        
        if ($action == 'get_PReturn' && isset($_GET['ProductReturnID'])) {
            get_PReturn($conn, $_GET['ProductReturnID']);
        } else	
        
        if ($action == 'get_ppreceipt' && isset($_GET['ProductReceiptID'])) {
            get_ppreceipt($conn, $_GET['ProductReceiptID']);
        } else	

        if ($action == 'get_ppreceiptall' && isset($_GET['ProductReceiptID'])) {
            get_ppreceiptall($conn, $_GET['ProductReceiptID']);
        } else	
		
        if ($action == 'get_Returnall' && isset($_GET['ProductReturnID'])) {
            get_Returnall($conn, $_GET['ProductReturnID']);
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
        } else
        
        if ($action == 'create_challan_details') {
            create_challan_details($conn);
        } else

        if ($action == 'Create_DeliveryChallanAll') {
            Create_DeliveryChallanAll($conn);
        } else

        if ($action == 'Create_InvoiceAll') {
            Create_InvoiceAll($conn);
        } else
        
        if ($action == 'Update_SalesOrderStatus') {
            Update_SalesOrderStatus($conn);
        } else

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

        if ($action == 'create_sndApprovalDetailsVisitPlan'  && isset($_GET['VisitPlanID'])) {
			create_sndApprovalDetailsVisitPlan($conn, $_GET['VisitPlanID']);
		} else

        if ($action == 'create_sndApprovalRejected_CancelledVisitPlan') {
			create_sndApprovalRejected_CancelledVisitPlan($conn);
		} else


		if ($action == 'create_sndApprovalRejected_Cancelled') {
			create_sndApprovalRejected_Cancelled($conn);
		} else

        if ($action == 'create_sndApprovalRejected_CancelledBDExpReq') {
			create_sndApprovalRejected_CancelledBDExpReq($conn);
		} else

        if ($action == 'create_sndApprovalRejected_CancelledMR' && isset($_GET['MRID'])) {
			create_sndApprovalRejected_CancelledMR($conn, $_GET['MRID']);
		} else
		
		  if ($action == 'create_sndApprovalRejected_CancelledVisitEntry' && isset($_GET['VisitPlanID'])) {
			create_sndApprovalRejected_CancelledVisitEntry($conn, $_GET['VisitPlanID']);
		} else
		
        if ($action == 'create_sndApprovalDetailsBDExpReq'  && isset($_GET['BDExpReqID'])) {
			create_sndApprovalDetailsBDExpReq($conn, $_GET['BDExpReqID']);
		} else
			
        if ($action == 'create_sndApprovalDetailsMR'  && isset($_GET['MRID'])) {
			create_sndApprovalDetailsMR($conn, $_GET['MRID']);
		} else
			
		  if ($action == 'create_sndApprovalDetailsVisitEntry'  && isset($_GET['VisitPlanID'])) {
			create_sndApprovalDetailsVisitEntry($conn, $_GET['VisitPlanID']);
		} else

		if ($action == 'create_order_details') {
			create_order_details($conn);
		} else
			
		if ($action == 'create_ppreceiptdetails') {
			create_ppreceiptdetails($conn);
		} else

        if ($action == 'create_PReturn') {
			create_PReturn($conn);
		} else

        if ($action == 'create_PReturnall') {
			create_PReturnall($conn);
		} else

        if ($action == 'create_PTransferMaster') {
			create_PTransferMaster($conn);
		} else	
        if ($action == 'create_PTransferDetails') {
			create_PTransferDetails($conn);
		} else	

		if ($action == 'create_PTransferall') {
			create_PTransferall($conn);
		} else	
        
        if ($action == 'create_preturndetails') {
			create_preturndetails($conn);
		} else
	
if ($action == 'create_ppreceiptall') {
			create_ppreceiptall($conn);
		} else
	
		if ($action == 'create_visit_plan') {
            create_visit_plan($conn);
        } else 

        if ($action == 'create_visit_plan_TADA_details') {
            create_visit_plan_TADA_details($conn);
        } else 
        
		if ($action == 'create_visit_plan_TADA_details_withimage') {
            create_visit_plan_TADA_details_withimage($conn);
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
			
        if ($action == 'create_visit_entryall' && isset($_GET['VisitPlanID'])) {
			create_visit_entryall($conn, $_GET['VisitPlanID']);
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
			
		if ($action == 'create_visit_plan_details') {
            create_visit_plan_details($conn);
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
		
		if ($action == 'generate_new_product_Transfer_number') {
            generate_new_product_Transfer_number($conn);
        } else 

        if ($action == 'generate_new_product_receipt_number1') {
            generate_new_product_receipt_number1($conn);
        } else 

        if ($action == 'generate_new_product_return_number') {
            generate_new_product_return_number($conn);
        } else 

        if ($action == 'generate_new_visit_plan_number') {
            generate_new_visit_plan_number($conn);
        } else 
        
			
        if ($action == 'generate_new_BDExpReq_number') {
            generate_new_BDExpReq_number($conn);
        } else 

	    if ($action == 'generate_new_salesorder_number') {
            generate_new_salesorder_number($conn);
        } else 

       if ($action == 'generate_new_SpecimenOrder_number') {
            generate_new_SpecimenOrder_number($conn);
        } else 

		if ($action == 'generate_new_Challan_number') {
            generate_new_Challan_number($conn);
        } else 

        if ($action == 'generate_new_invoice_number') {
            generate_new_invoice_number($conn);
        } else 
				
		if ($action == 'generate_new_money_receipt_number') {
            generate_new_money_receipt_number($conn);
        } else 

        if ($action == 'create_BDExpReqAll') {
            create_BDExpReqAll($conn);
        } else 
		
        if ($action == 'create_BDExpReqMaster') {
            create_BDExpReqMaster($conn);
        } else 

        if ($action == 'create_BDExpReqDetails') {
            create_BDExpReqDetails($conn);
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
			
		if ($action == 'update_salesorderdetails' && isset($_GET['SalesOrderDetailID'])) {
            update_salesorderdetails($conn, $_GET['SalesOrderDetailID']);
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
		
	 if ($action == 'update_PReturnall' && isset($_GET['ProductReturnID'])) {
        update_PReturnall($conn, $_GET['ProductReturnID']);
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

        if ($action == 'update_visit_entry' && isset($_GET['VisitPlanID'])) {
            update_visit_entry($conn, $_GET['VisitPlanID']);
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
			
        if ($action == 'Update_BDExpReqAll') {
            Update_BDExpReqAll($conn);
        } else

        if ($action == 'Update_BDExpReq') {
            Update_BDExpReq($conn);
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
		
        if ($action == 'delete_partyArea' && isset($_GET['PartyAreaID'])) {
            delete_partyArea($conn, $_GET['PartyAreaID']);
        } else
				
		if ($action == 'delete_visit_plan' && isset($_GET['VisitPlanID'])) {
            delete_visit_plan($conn, $_GET['VisitPlanID']);
        } else 
			
		if ($action == 'delete_VisitPlan_TADADetails' && isset($_GET['VisitPlanTADADetailsID'])) {
            delete_VisitPlan_TADADetails($conn, $_GET['VisitPlanTADADetailsID']);
        } else 


		if ($action == 'delete_institution' && isset($_GET['institutionID'])) {
            delete_institution($conn, $_GET['institutionID']);
        } else 
			
		if ($action == 'delete_preceiptdetails' && isset($_GET['ProductReceiptDetailsID'])) {
            delete_preceiptdetails($conn, $_GET['ProductReceiptDetailsID']);
        } else 

        if ($action == 'delete_preturndetails' && isset($_GET['ProductReturnDetailsID'])) {
            delete_preturndetails($conn, $_GET['ProductReturnDetailsID']);
        } else 
			
		if ($action == 'delete_pTransferdetails' && isset($_GET['ProductTransferDetailsID'])) {
            delete_pTransferdetails($conn, $_GET['ProductTransferDetailsID']);
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

        if ($action == 'delete_partydetailsAreas' && isset($_GET['PartyAreaID'])) {
            delete_partydetailsAreas($conn, $_GET['PartyAreaID']);
        } else  
			
		if ($action == 'delete_SalesOrderDetails' && isset($_GET['SalesOrderDetailID'])) {
            delete_SalesOrderDetails($conn, $_GET['SalesOrderDetailID']);
        } else

        if ($action == 'delete_BDExpReqDetails' && isset($_GET['BDExpReqDetailsID'])) {
            delete_BDExpReqDetails($conn, $_GET['BDExpReqDetailsID']);
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


date_default_timezone_set('Asia/Dhaka'); // Ensure correct time zone

function user_login($conn) {
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (!isset($inputData['Username']) || !isset($inputData['Password'])) {
        echo json_encode(["error" => "Username and Password are required"]);
        return;
    }

    $Username = $inputData['Username'];
    $Password = $inputData['Password'];

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

        if (hash('sha256', $Password) === $storedHashedPassword) {

            // --- Set user picture URL ---
            $userPicturePath = $row['Userpicture'];
            if (!empty($userPicturePath) && file_exists($userPicturePath)) {
                $userPicturePath = 'http://192.168.88.116/ABPolymer/' . $userPicturePath;
            } else {
                $userPicturePath = 'http://192.168.88.116/ABPolymer/default_profile_picture.png';
            }

            // --- Logging user login ---
            $userID = $row['UserID'];
            $loginTime = date('Y-m-d H:i:s');
            $logoutTime = null;
            $ipAddress = $_SERVER['REMOTE_ADDR'] ?? null;
            $deviceDetails = $_SERVER['HTTP_USER_AGENT'] ?? null;
            $status = 'Active';
            $createdAt = $loginTime;
            $modifiedAt = null;

            $insertQuery = "
                INSERT INTO sndUserLog 
                    (UserID, LoginTime, LogoutTime, IPAddress, DeviceDetails, Status, CreatedAt, ModifiedAt)
                VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?)
            ";

            $insertParams = array(
                $userID,
                $loginTime,
                $logoutTime,
                $ipAddress,
                $deviceDetails,
                $status,
                $createdAt,
                $modifiedAt
            );

            $insertStmt = sqlsrv_query($conn, $insertQuery, $insertParams);
            if ($insertStmt === false) {
                echo json_encode(["error" => "Login successful, but failed to log login time: " . print_r(sqlsrv_errors(), true)]);
                return;
            }

            // --- Return success response ---
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


function get_InvoiceOrderDetails($conn, $InvoiceID) {
    if (!$InvoiceID) {
        echo json_encode(["error" => "Missing required field: InvoiceID"]);
        return;
    }

    // Query for Invoice Master
    $sqlMaster = "SELECT 
    dcm.InvoiceID,
    dcm.InvoiceNo,
    CONVERT(VARCHAR(10), dcm.InvoiceDate, 105) AS InvoiceDate, -- DD-MM-YYYY format
    so.PartyID,
    pm.PartyName,
    pm.Address,
    pm.ContactNumber,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.ChallanID,
    dccm.ChallanNo,
    so.SalesOrderNo,
    dccm.SalesOrderID,
    sot.SalesOrderTypeID,
    FORMAT(ISNULL(dcm.TotalAmount, 0), 'N2') as TotalAmount,
    dcm.InWord,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    dcm.UserID,
    su.EmpName AS UserName,
    suv.Designation AS Designation,
    su.EmpName AS PreparedUserName,
    suv.Designation AS PreparedDesignation,
    authuser.EmpName AS AuthorizedUserName,
    authuser_view.Designation AS AuthorizedDesignation,
    approver.EmpName AS ApprovedUserName,
    approver_view.Designation AS ApprovedDesignation,
    st.Statusmeans AS StatusName,
    
    -- Calculate Total_Discount from sndInvoiceDetails
    (SELECT SUM(Amount*(Discount/100)) 
     FROM sndInvoiceDetails 
     WHERE InvoiceID = dcm.InvoiceID) AS Total_Discount,
     
    (SELECT SUM(Amount) 
     FROM sndInvoiceDetails 
     WHERE InvoiceID = dcm.InvoiceID) AS TotalwithDiscount,
    
    -- Calculate Net_Amount (TotalAmount + NetAmount from sndInvoiceDetails + Expenses)
    (SELECT SUM(Amount) 
     FROM sndInvoiceDetails 
     WHERE InvoiceID = dcm.InvoiceID) + 
    (SELECT SUM(Amount) 
     FROM sndInvoiceDetailsExpense 
     WHERE InvoiceID = dcm.InvoiceID) AS Net_Amount,

    -- Convert Net_Amount to words
    dbo.fnNumberToWords(
        (SELECT SUM(Amount) FROM sndInvoiceDetails WHERE InvoiceID = dcm.InvoiceID) + 
        (SELECT SUM(Amount) FROM sndInvoiceDetailsExpense WHERE InvoiceID = dcm.InvoiceID)
    ) AS Net_Amount_Inword
FROM 
    sndInvoiceMaster dcm
LEFT JOIN 
    sndDeliveryChallanMaster dccm ON dccm.ChallanID = dcm.ChallanID
LEFT JOIN 
    sndSalesOrders so ON dccm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndInvoiceMaster'
LEFT JOIN 
    sndUsers su ON dcm.UserID = su.UserID
LEFT JOIN 
    sndUserView suv ON dcm.UserID = suv.UserID
LEFT JOIN 
    sndApprovalDetails ad ON dccm.SalesOrderID = ad.ApprovalTypeID AND ad.AppStatus = 3
LEFT JOIN 
    sndUsers authuser ON ad.ApprovalDetailsByID = authuser.UserID
LEFT JOIN 
    sndUserView authuser_view ON ad.ApprovalDetailsByID = authuser_view.UserID
LEFT JOIN 
    sndUsers approver ON dccm.UserID = approver.UserID
LEFT JOIN 
    sndUserView approver_view ON dccm.UserID = approver_view.UserID
        WHERE 
        dcm.InvoiceID = ?";

    $stmtMaster = sqlsrv_query($conn, $sqlMaster, [$InvoiceID]);

    if ($stmtMaster === false) {
        echo json_encode(["error" => "Error fetching Invoice master: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $InvoiceMaster = sqlsrv_fetch_array($stmtMaster, SQLSRV_FETCH_ASSOC);

    if (!$InvoiceMaster) {
        echo json_encode(["error" => "No challan found for the provided InvoiceID"]);
        return;
    }

    // Query for Invoice Details
    $sqlDetails = "SELECT 
                      d.InvoiceDetailID, 
                      d.FinancialYearID, 
                      (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = d.FinancialYearID) as FinancialYear,
                      d.ProductCategoryID, 
                      d.ProductID, 
                      CONCAT(p.ProductName, ' - ', right((select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = d.FinancialYearID),4)) as ProductNameRepo,
                      p.ProductName, 
                      d.Quantity, 
                      d.UnitPrice, 
                      d.Discount,
                      (d.Quantity * d.UnitPrice)-((d.Quantity * d.UnitPrice)*d.Discount)/100 AS SubTotal,
                      d.CreatedAt 
                   FROM sndInvoiceDetails d
                   LEFT JOIN sndProducts p ON d.ProductID = p.ProductID
                   WHERE d.InvoiceID = ?";
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$InvoiceID]);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching Invoice Details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $InvoiceDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $InvoiceDetails[] = $row;
    }

    // ✅ Query for Invoice Expense Details
    $sqlExpense = "SELECT 
                      InvoiceDetailsExpenseID, 
                      ParticularsID,
                      (SELECT ParticularsName FROM sndParticulars 
                       WHERE sndParticulars.ParticularsID = sndInvoiceDetailsExpense.ParticularsID) AS ParticularsName,
                       CONCAT(Quantity, ' ',(SELECT Units FROM sndParticulars 
                       WHERE sndParticulars.ParticularsID = sndInvoiceDetailsExpense.ParticularsID)) as QtyRate,
                      Quantity, 
                      UnitPrice, 
                      Quantity * UnitPrice AS Amount 
                   FROM sndInvoiceDetailsExpense 
                   WHERE InvoiceID = ?";
    $stmtExpense = sqlsrv_query($conn, $sqlExpense, [$InvoiceID]);

    if ($stmtExpense === false) {
        echo json_encode(["error" => "Error fetching Invoice Expense Details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $InvoiceExpenseDetails = [];
    while ($row = sqlsrv_fetch_array($stmtExpense, SQLSRV_FETCH_ASSOC)) {
        $InvoiceExpenseDetails[] = $row;
    }

    // Combine and return the result
    $result = [
        "InvoiceMaster" => $InvoiceMaster,
        "InvoiceDetails" => $InvoiceDetails,
        "InvoiceExpenseDetails" => $InvoiceExpenseDetails // ✅ Added expense details to the response
    ];

    echo json_encode($result);
}

// Function to get all challans
function get_challansOrder($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.ChallanID) AS SL, 
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    isnull(so.pertialchallanstatus,0) as pertialchallanstatus,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.SalesOrderID,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndDeliveryChallanMaster dcm
LEFT JOIN 
    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
WHERE 
    sot.SalesOrderTypeID =1 order by dcm.ChallanID desc;
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


function get_challansOrder_users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) {   

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.ChallanID) AS SL, 
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.SalesOrderID,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndDeliveryChallanMaster dcm
LEFT JOIN 
    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
WHERE 
    sot.SalesOrderTypeID =1 order by dcm.ChallanID desc;
";
    $stmt = sqlsrv_query($conn, $sql);

} else {

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.ChallanID) AS SL, 
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.SalesOrderID,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndDeliveryChallanMaster dcm
LEFT JOIN 
    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
WHERE 
   so.OrderTypeID = 1 and dcm.UserID = ?
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)))
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))))

order by dcm.ChallanID desc;
";

    $params = [$UserID, $UserID, $UserID, $UserID, $UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

}

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


function get_ChallanOrderDetails($conn, $ChallanID) {
    if (!$ChallanID) {
        echo json_encode(["error" => "Missing required field: ChallanID"]);
        return;
    }

     $sqlMaster = "SELECT  distinct
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    pm.PartyName,
    pm.Address,
    pm.ContactNumber,
    so.SpecimenUserID,
    u.EmpName AS EmployeeName,
    dcm.SalesOrderID,
    so.SalesOrderNo,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName,
    dcm.UserID,
    u.EmpName AS UserName,
    u.Designation AS Designation,
    sou.EmpName AS SalesOrderUserName,
    sou.Designation AS SODesignation,
     AdAppuser.EmpName AS AuthorizedUserName,
    AdAppuser.Designation AS AuthorizedDesignation,
    u.EmpName AS ApprovedUserName,
     u.Designation AS ApprovedDesignation
FROM sndDeliveryChallanMaster dcm
LEFT JOIN sndSalesOrders so 
    ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN sndPartyMaster pm 
    ON so.PartyID = pm.PartyID
LEFT JOIN sndUserView u 
    ON dcm.UserID = u.userid
LEFT JOIN sndUserView sou 
    ON so.UserID = sou.userid
LEFT JOIN sndSalesOrderType sot 
    ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN sndStatus st 
    ON dcm.Status = st.status 
   AND st.statustables = 'sndDeliveryChallan'
LEFT JOIN sndApprovalDetails adAuth 
    ON dcm.SalesOrderID = adAuth.ApprovalTypeID 
   AND adAuth.AppStatus = 2 and adAuth.ApprovalType = 'sndSalesOrders'
LEFT JOIN sndApprovalDetails adApp 
    ON dcm.SalesOrderID = adApp.ApprovalTypeID 
   AND adApp.AppStatus = 3 and adApp.ApprovalType = 'sndSalesOrders'
LEFT JOIN sndUserView AdAuthuser 
    ON adAuth.UserID = AdAuthuser.userid
LEFT JOIN sndUserView AdAppuser 
    ON adApp.UserID = AdAppuser.userid
WHERE dcm.ChallanID = ?";

    // Query for Challan Master with updated SQL
    $sqlMaster1 = "SELECT  
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    pm.PartyName,
    pm.Address,
    pm.ContactNumber,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.SalesOrderID,
    so.SalesOrderNo,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName,
    dcm.UserID,
    su.EmpName AS UserName,
    suv.Designation AS Designation,
    souser.EmpName AS SalesOrderUserName,
    souser_view.Designation AS SODesignation,
    authuser.EmpName AS AuthorizedUserName,
    authuser_view.Designation AS AuthorizedDesignation,
    approver.EmpName AS ApprovedUserName,
    approver_view.Designation AS ApprovedDesignation
FROM 
    sndDeliveryChallanMaster dcm
LEFT JOIN 
    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
LEFT JOIN 
    sndUsers su ON dcm.UserID = su.UserID
LEFT JOIN 
    sndUserView suv ON dcm.UserID = suv.UserID
LEFT JOIN 
    sndUsers souser ON so.UserID = souser.UserID
LEFT JOIN 
    sndUserView souser_view ON so.UserID = souser_view.UserID
LEFT JOIN 
    sndApprovalDetails ad ON dcm.SalesOrderID = ad.ApprovalTypeID AND ad.AppStatus = 3
LEFT JOIN 
    sndUsers authuser ON ad.ApprovalDetailsByID = authuser.UserID
LEFT JOIN 
    sndUserView authuser_view ON ad.ApprovalDetailsByID = authuser_view.UserID
LEFT JOIN 
    sndUsers approver ON dcm.UserID = approver.UserID
LEFT JOIN 
    sndUserView approver_view ON dcm.UserID = approver_view.UserID
                  WHERE 
                    dcm.ChallanID = ?";

    $stmtMaster = sqlsrv_query($conn, $sqlMaster, [$ChallanID]);

    if ($stmtMaster === false) {
        echo json_encode(["error" => "Error fetching challan master: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challanMaster = sqlsrv_fetch_array($stmtMaster, SQLSRV_FETCH_ASSOC);

    if (!$challanMaster) {
        echo json_encode(["error" => "No challan found for the provided ChallanID"]);
        return;
    }

    // Query for Challan Details
    $sqlDetails = "SELECT 
                      d.ChallanDetailID, 
                      d.FinancialYearID, 
                      (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = d.FinancialYearID) as FinancialYear,
                      d.ProductCategoryID, 
                      d.ProductID, 
                      p.ProductName, 
                      CONCAT(p.ProductName, ' - ', right((select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = d.FinancialYearID),4)) as ProductNameRepo,
                      d.OrderQty, 
                      d.ChallanQty, 
                      d.AvailQty, 
                      d.CreatedAt 
                   FROM sndDeliveryChallanDetails d
                   LEFT JOIN sndProducts p ON d.ProductID = p.ProductID
                   WHERE d.ChallanID = ?";
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$ChallanID]);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching challan details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challanDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $challanDetails[] = $row;
    }

    // Combine and return the result
    $result = [
        "ChallanMaster" => $challanMaster,
        "ChallanDetails" => $challanDetails
    ];

    echo json_encode($result);
}

function get_ChallanToInvoice($conn, $ChallanID) {
    if (!$ChallanID) {
        echo json_encode(["error" => "Missing required field: ChallanID"]);
        return;
    }

    // Query for Challan Master with updated SQL
    $sqlMaster = "SELECT  
                    dcm.ChallanID,
                    dcm.ChallanNo,
                    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
                    so.PartyID,
                    pm.PartyName,
                    so.SpecimenUserID,
                    u.empname AS EmployeeName,
                    dcm.SalesOrderID,
                    so.SalesOrderNo,
                    sot.SalesOrderTypeID,
                    sot.SalesOrder AS SalesOrderType,
                    dcm.Status,
                    st.Statusmeans AS StatusName
                  FROM 
                    sndDeliveryChallanMaster dcm
                  LEFT JOIN 
                    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
                  LEFT JOIN 
                    sndPartyMaster pm ON so.PartyID = pm.PartyID
                  LEFT JOIN 
                    sndUsers u ON so.SpecimenUserID = u.userid
                  LEFT JOIN 
                    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
                  LEFT JOIN 
                    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
                  WHERE 
                    dcm.ChallanID = ?";

    $stmtMaster = sqlsrv_query($conn, $sqlMaster, [$ChallanID]);

    if ($stmtMaster === false) {
        echo json_encode(["error" => "Error fetching challan master: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challanMaster = sqlsrv_fetch_array($stmtMaster, SQLSRV_FETCH_ASSOC);

    if (!$challanMaster) {
        echo json_encode(["error" => "No challan found for the provided ChallanID"]);
        return;
    }

    // Query for Challan Details
    $sqlDetails = "SELECT 
                      d.ChallanDetailID, 
                      d.FinancialYearID, 
                      (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = d.FinancialYearID) as FinancialYear,
                      d.ProductCategoryID, 
                      (SELECT CategoryName FROM sndCategorydata WHERE ID = d.ProductCategoryID) AS ProductCategoryName,
                      d.ProductID, 
                      p.ProductName, 
                      d.OrderQty, 
                      d.ChallanQty, 
					  (select sod.Price from sndSalesOrderDetails sod, sndSalesOrders so 
					  where sod.SalesOrderID = so.salesOrderID and sod.ProductID = d.ProductID and so.SalesOrderID = cm.SalesOrderID) as PRate,
                      d.ChallanQty*(select sod.Price from sndSalesOrderDetails sod, sndSalesOrders so 
					  where sod.SalesOrderID = so.salesOrderID and sod.ProductID = d.ProductID and so.SalesOrderID = cm.SalesOrderID) as Total,
                      d.CreatedAt 
                   FROM sndDeliveryChallanDetails d
                   LEFT JOIN sndProducts p ON d.ProductID = p.ProductID
                   LEFT JOIN sndDeliveryChallanMaster cm ON cm.ChallanID = d.ChallanID
                   WHERE d.ChallanID = ?";
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$ChallanID]);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching challan details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $challanDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $challanDetails[] = $row;
    }

    // Combine and return the result
    $result = [
        "ChallanMaster" => $challanMaster,
        "ChallanDetails" => $challanDetails
    ];

    echo json_encode($result);
}


function get_productSpecimenQty($conn, $FinancialYearID, $ProductID, $SpecimenUserID) {
    
    // Fetch Stock-In Quantity
    $sql = "SELECT CAST(SUM(Quantity) AS DECIMAL(10,2)) AS StockIn 
            FROM sndStockInOutSpecimen 
            WHERE TransactionType = 'Stock-In' 
              AND FinancialYearID = ? 
              AND ProductID = ? 
              AND SpecimenUserID = ?";
    
    $params = [$FinancialYearID, $ProductID, $SpecimenUserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Stock-In: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $StockIn = $row ? (float)$row['StockIn'] : 0.00; // Default to 0 if no data

    // Fetch Stock-Out Quantity
    $sql = "SELECT CAST(SUM(Quantity) AS DECIMAL(10,2)) AS StockOut 
            FROM sndStockInOutSpecimen
            WHERE TransactionType = 'Stock-Out' 
              AND FinancialYearID = ? 
              AND ProductID = ? 
              AND SpecimenUserID = ?";

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Stock-Out: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $StockOut = $row ? (float)$row['StockOut'] : 0.00; // Default to 0 if no data

    // Calculate Available Quantity
    $AvailQty = $StockIn - $StockOut;

    echo json_encode(["AvailQty" => $AvailQty]);
}

// Function to get all challans
function get_challansSpecimen($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.ChallanID) AS SL, 
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.SalesOrderID,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndDeliveryChallanMaster dcm
LEFT JOIN 
    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
WHERE 
    sot.SalesOrderTypeID =2 order by dcm.ChallanID desc;
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


function get_challansSpecimen_users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) {     

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.ChallanID) AS SL, 
    dcm.ChallanID,
    dcm.ChallanNo,
    CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
    dcm.SalesOrderID,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndDeliveryChallanMaster dcm
LEFT JOIN 
    sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
WHERE 
    sot.SalesOrderTypeID =2 order by dcm.ChallanID desc;
";
    $stmt = sqlsrv_query($conn, $sql);

} else {

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY dcm.ChallanID) AS SL, 
   dcm.ChallanID,
   dcm.ChallanNo,
   CONVERT(CHAR(11), dcm.ChallanDate, 120) AS ChallanDate,
   so.PartyID,
   pm.PartyName,
   so.SpecimenUserID,
   u.empname AS EmployeeName,
   dcm.SalesOrderID,
   sot.SalesOrderTypeID,
   sot.SalesOrder AS SalesOrderType,
   dcm.Status,
   st.Statusmeans AS StatusName
FROM 
   sndDeliveryChallanMaster dcm
LEFT JOIN 
   sndSalesOrders so ON dcm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
   sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
   sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
   sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
   sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndDeliveryChallan'
WHERE 
   so.OrderTypeID = 2 and dcm.UserID = ?
   or so.OrderTypeID = 2 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)
   or so.OrderTypeID = 2 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))
   or so.OrderTypeID = 2 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)))
   or so.OrderTypeID = 2 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))))

   order by dcm.ChallanID desc;
";

$params = [$UserID, $UserID, $UserID, $UserID, $UserID];
$stmt = sqlsrv_query($conn, $sql, $params);

}


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


function get_invoiceSalesOrder($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.InvoiceID) AS SL, 
    dcm.InvoiceID,
    dcm.InvoiceNo,
    CONVERT(CHAR(11), dcm.InvoiceDate, 120) AS InvoiceDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
	dcm.ChallanID,
    dccm.ChallanNo,
	dccm.ChallanDate,
    dccm.SalesOrderID,
    so.SalesOrderNo,
     so.OrderDate,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndInvoiceMaster dcm
LEFT JOIN 
    sndDeliveryChallanMaster dccm ON dccm.ChallanID = dcm.ChallanID
LEFT JOIN 
    sndSalesOrders so ON dccm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndInvoiceMaster'
WHERE 
    sot.SalesOrderTypeID =1 order by dcm.InvoiceID desc
    ";
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


function get_invoiceSalesOrder_users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) { 

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.InvoiceID) AS SL, 
    dcm.InvoiceID,
    dcm.InvoiceNo,
    CONVERT(CHAR(11), dcm.InvoiceDate, 120) AS InvoiceDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
	dcm.ChallanID,
    dccm.ChallanNo,
	dccm.ChallanDate,
    dccm.SalesOrderID,
    so.SalesOrderNo,
     so.OrderDate,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndInvoiceMaster dcm
LEFT JOIN 
    sndDeliveryChallanMaster dccm ON dccm.ChallanID = dcm.ChallanID
LEFT JOIN 
    sndSalesOrders so ON dccm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndInvoiceMaster'
WHERE 
    sot.SalesOrderTypeID =1 order by dcm.InvoiceID desc
    ";
    $stmt = sqlsrv_query($conn, $sql);

} else {

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY dcm.InvoiceID) AS SL, 
   dcm.InvoiceID,
   dcm.InvoiceNo,
   CONVERT(CHAR(11), dcm.InvoiceDate, 120) AS InvoiceDate,
   so.PartyID,
   pm.PartyName,
   so.SpecimenUserID,
   u.empname AS EmployeeName,
   dcm.ChallanID,
   dccm.ChallanNo,
   dccm.ChallanDate,
   dccm.SalesOrderID,
   so.SalesOrderNo,
    so.OrderDate,
   sot.SalesOrderTypeID,
   sot.SalesOrder AS SalesOrderType,
   dcm.Status,
   st.Statusmeans AS StatusName
FROM 
   sndInvoiceMaster dcm
LEFT JOIN 
   sndDeliveryChallanMaster dccm ON dccm.ChallanID = dcm.ChallanID
LEFT JOIN 
   sndSalesOrders so ON dccm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
   sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
   sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
   sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
   sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndInvoiceMaster'
WHERE 
   so.OrderTypeID = 1 and dcm.UserID = ?
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)))
   or so.OrderTypeID = 1 and dcm.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))))

 order by dcm.InvoiceID desc
   ";

   $params = [$UserID, $UserID, $UserID, $UserID, $UserID];
   $stmt = sqlsrv_query($conn, $sql, $params);

}

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



function get_invoiceSpecimenOrder($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.InvoiceID) AS SL, 
    dcm.InvoiceID,
    dcm.InvoiceNo,
    CONVERT(CHAR(11), dcm.InvoiceDate, 120) AS InvoiceDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
	dcm.ChallanID,
    dccm.ChallanNo,
	dccm.ChallanDate,
    dccm.SalesOrderID,
    so.SalesOrderNo,
    so.OrderDate,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndInvoiceMaster dcm
LEFT JOIN 
    sndDeliveryChallanMaster dccm ON dccm.ChallanID = dcm.ChallanID
LEFT JOIN 
    sndSalesOrders so ON dccm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndInvoiceMaster'
WHERE 
    sot.SalesOrderTypeID =2  order by dcm.InvoiceID desc";
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

function get_invoiceSpecimenOrder_users($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY dcm.InvoiceID) AS SL, 
    dcm.InvoiceID,
    dcm.InvoiceNo,
    CONVERT(CHAR(11), dcm.InvoiceDate, 120) AS InvoiceDate,
    so.PartyID,
    pm.PartyName,
    so.SpecimenUserID,
    u.empname AS EmployeeName,
	dcm.ChallanID,
    dccm.ChallanNo,
	dccm.ChallanDate,
    dccm.SalesOrderID,
    so.SalesOrderNo,
    so.OrderDate,
    sot.SalesOrderTypeID,
    sot.SalesOrder AS SalesOrderType,
    dcm.Status,
    st.Statusmeans AS StatusName
FROM 
    sndInvoiceMaster dcm
LEFT JOIN 
    sndDeliveryChallanMaster dccm ON dccm.ChallanID = dcm.ChallanID
LEFT JOIN 
    sndSalesOrders so ON dccm.SalesOrderID = so.SalesOrderID
LEFT JOIN 
    sndPartyMaster pm ON so.PartyID = pm.PartyID
LEFT JOIN 
    sndUsers u ON so.SpecimenUserID = u.userid
LEFT JOIN 
    sndSalesOrderType sot ON so.OrderTypeID = sot.SalesOrderTypeID
LEFT JOIN 
    sndStatus st ON dcm.Status = st.status AND st.statustables = 'sndInvoiceMaster'
WHERE 
    sot.SalesOrderTypeID =2  order by dcm.InvoiceID desc";
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

function create_ChallanMaster($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndDeliveryChallanMaster (ChallanNo, ChallanDate, SalesOrderID, UserID, CreatedAt) VALUES (?, ?, ?, ?, GETDATE())";
    $params = [
        $data['ChallanNo'], 
        $data['ChallanDate'], 
        $data['SalesOrderID'], 
        $data['UserID']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Challan created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating challan: " . print_r(sqlsrv_errors(), true)]);
    }
}

function create_challan_details($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO sndDeliveryChallanDetails (ChallanID, FinancialYearID, ProductCategoryID, ProductID, OrderQty,ChallanQty,AvailQty, CreatedAt) 
    VALUES (?, ?, ?, ?,?,?,?, GETDATE())";
    $params = [
        $data['ChallanID'], 
        $data['FinancialYearID'], 
        $data['ProductCategoryID'], 
        $data['ProductID'], 
        $data['OrderQty'],
        $data['ChallanQty'], 
        $data['AvailQty']
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Challan detail created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating challan detail: " . print_r(sqlsrv_errors(), true)]);
    }
}

function Create_InvoiceAll($conn) { 
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['InvoiceNo'], $data['InvoiceDate'], $data['ChallanID'], $data['TotalAmount'], $data['UserID'], $data['Details'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Step 1: Insert into Invoice Master
        $sqlMaster = "INSERT INTO sndInvoiceMaster (InvoiceNo, InvoiceDate, ChallanID, TotalAmount, Inword, UserID, Status, CreatedAt, ModifiedAt) 
        OUTPUT INSERTED.InvoiceID 
        VALUES (?, ?, ?, ?, ?, ?, 1, GETDATE(), GETDATE())";


        $paramsMaster = [
            $data['InvoiceNo'],
            $data['InvoiceDate'],
            $data['ChallanID'],
            $data['TotalAmount'],
            $data['Inword'],
            $data['UserID'],
            1 // Status default to 1
        ];

        $stmtMaster = sqlsrv_query($conn, $sqlMaster, $paramsMaster);
        if ($stmtMaster === false) {
            throw new Exception("Error creating invoice master: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted InvoiceID
        $row = sqlsrv_fetch_array($stmtMaster, SQLSRV_FETCH_ASSOC);
        $InvoiceID = $row['InvoiceID'] ?? null;

        if (is_null($InvoiceID)) {
            throw new Exception("InvoiceID is null. Check if the insert was successful.");
        }

        // Step 2: Insert into Invoice Details
        $sqlDetails = "INSERT INTO sndInvoiceDetails (InvoiceID, FinancialYearID, ProductCategoryID, ProductID, Quantity, UnitPrice, Discount, CreatedAt) 
                       VALUES (?, ?, ?, ?, ?, ?,?,  GETDATE())";

        foreach ($data['Details'] as $detail) {
            $paramsDetails = [
                $InvoiceID,  // ✅ Use the retrieved InvoiceID
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['UnitPrice'],
                $detail['Discount']
            ];

            $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsDetails);
            if ($stmtDetails === false) {
                throw new Exception("Error creating invoice details: " . print_r(sqlsrv_errors(), true));
            }
        }

        // ✅ Step 3: Insert into Invoice Expense Details (if available)
        if (!empty($data['DetailsCost'])) {
            $sqlDetailsCost = "INSERT INTO sndInvoiceDetailsExpense (InvoiceID, ParticularsID, Quantity, UnitPrice, CreatedAt) 
                               VALUES (?, ?, ?, ?, GETDATE())";

            foreach ($data['DetailsCost'] as $detail) {
                $paramsDetailsCost = [
                    $InvoiceID,
                    $detail['ParticularsID'],
                    $detail['Quantity'],
                    $detail['UnitPrice']
                ];

                $stmtDetailsCost = sqlsrv_query($conn, $sqlDetailsCost, $paramsDetailsCost);
                if ($stmtDetailsCost === false) {
                    throw new Exception("Error creating invoice expense details: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Step 4: Update Delivery Challan Status
        $sqlUpdateChallan = "UPDATE sndDeliveryChallanMaster SET Status = 2 WHERE ChallanID = ?";
        $paramsUpdateChallan = [$data['ChallanID']];
        $stmtUpdateChallan = sqlsrv_query($conn, $sqlUpdateChallan, $paramsUpdateChallan);
        if ($stmtUpdateChallan === false) {
            throw new Exception("Error updating delivery challan status: " . print_r(sqlsrv_errors(), true));
        }

        // ✅ Fetch SalesOrderID from Delivery Challan
        $sqlGetSalesOrder = "SELECT SalesOrderID FROM sndDeliveryChallanMaster WHERE ChallanID = ?";
        $stmtGetSalesOrder = sqlsrv_query($conn, $sqlGetSalesOrder, [$data['ChallanID']]);

        if ($stmtGetSalesOrder === false) {
            throw new Exception("Error fetching SalesOrderID: " . print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmtGetSalesOrder, SQLSRV_FETCH_ASSOC);
        $SalesOrderID = $row['SalesOrderID'] ?? null;

        if (is_null($SalesOrderID)) {
            throw new Exception("SalesOrderID is null. Check if the ChallanID is correct.");
        }

        // ✅ Step 5: Update Sales Order Status using fetched SalesOrderID
        $sqlUpdateSalesOrder = "UPDATE sndSalesOrders SET InvoiceStatus = 1 WHERE SalesOrderID = ?";
        $stmtUpdateSalesOrder = sqlsrv_query($conn, $sqlUpdateSalesOrder, [$SalesOrderID]);

        if ($stmtUpdateSalesOrder === false) {
            throw new Exception("Error updating sales order status: " . print_r(sqlsrv_errors(), true));
        }

        // ✅ Commit transaction
        sqlsrv_commit($conn);
        echo json_encode(["success" => "Invoice created successfully", "InvoiceID" => $InvoiceID]);
    } catch (Exception $e) {
        // ❌ Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function Update_SalesOrderStatus($conn) { 
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['SalesOrderID'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Assign SalesOrderID safely
    $SalesOrderID = (int)$data['SalesOrderID'];

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // ✅ Update Sales Order Status
        $sqlUpdateSalesOrder = "UPDATE sndSalesOrders 
                                SET challanstatus = 1, pertialchallanstatus = 0 
                                WHERE SalesOrderID = ?";
        $stmtUpdateSalesOrder = sqlsrv_query($conn, $sqlUpdateSalesOrder, [$SalesOrderID]);

        if ($stmtUpdateSalesOrder === false) {
            throw new Exception("Error updating sales order status: " . print_r(sqlsrv_errors(), true));
        }

        // ✅ Commit transaction
        sqlsrv_commit($conn);
        echo json_encode([
            "success" => "Order Completed successfully", 
            "OrderID" => $SalesOrderID
        ]);
    } catch (Exception $e) {
        // ❌ Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
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



function Create_DeliveryChallanAll($conn) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (
        !isset($data['ChallanNo'], $data['ChallanDate'], $data['SalesOrderID'], $data['UserID'], $data['Details'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Step 1: Create Challan Master
        $sqlMaster = "INSERT INTO sndDeliveryChallanMaster (ChallanNo, ChallanDate, SalesOrderID, UserID, CreatedAt) 
                      OUTPUT INSERTED.ChallanID VALUES (?, ?, ?, ?, GETDATE())";
        $paramsMaster = [
            $data['ChallanNo'],
            $data['ChallanDate'],
            $data['SalesOrderID'],
            $data['UserID']
        ];

        $stmtMaster = sqlsrv_query($conn, $sqlMaster, $paramsMaster);
        if ($stmtMaster === false) {
            throw new Exception("Error creating challan master: " . print_r(sqlsrv_errors(), true));
        }

          // Fetch the inserted ChallanID
          $row = sqlsrv_fetch_array($stmtMaster, SQLSRV_FETCH_ASSOC);
          $ChallanID = $row['ChallanID'] ?? null;

          if (is_null($ChallanID)) {
            throw new Exception("ChallanID is null. Check if the insert was successful.");
        }

        // Step 2: Create Challan Details
        $sqlDetails = "INSERT INTO sndDeliveryChallanDetails (ChallanID, FinancialYearID, ProductCategoryID, ProductID, OrderQty, ChallanQty, AvailQty, CreatedAt) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE())";
        foreach ($data['Details'] as $detail) {
            $paramsDetails = [
                $ChallanID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['OrderQty'],
                $detail['ChallanQty'],
                $detail['AvailQty']
            ];

            $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsDetails);
            if ($stmtDetails === false) {
                throw new Exception("Error creating challan detail: " . print_r(sqlsrv_errors(), true));
            }
        }

        /*
                // Step 3: Update Sales Order Status
                $sqlUpdateSalesOrder = "UPDATE sndSalesOrders SET challanstatus = 1 WHERE SalesOrderID = ?";
                $paramsUpdateSalesOrder = [$data['SalesOrderID']];
        
                $stmtUpdateSalesOrder = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdateSalesOrder);
                if ($stmtUpdateSalesOrder === false) {
                    throw new Exception("Error updating sales order status: " . print_r(sqlsrv_errors(), true));
                }

                */
        // Commit transaction
        sqlsrv_commit($conn);
        echo json_encode(["success" => "Delivery challan created successfully"]);
    } catch (Exception $e) {
        // Rollback transaction in case of any errors
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
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


function delete_partyArea($conn, $PartyAreaID) {
    try {
        // Validate PartyAreaID
        if (empty($PartyAreaID)) {
            throw new Exception("PartyAreaID is required");
        }

        // Prepare the SQL delete statement
        $sql = "DELETE FROM sndPartyArea WHERE PartyAreaID = ?";
        $stmt = sqlsrv_prepare($conn, $sql, [$PartyAreaID]);

        // Check preparation
        if ($stmt === false) {
            throw new Exception("Error preparing delete statement: " . print_r(sqlsrv_errors(), true));
        }

        // Execute the statement
        if (!sqlsrv_execute($stmt)) {
            throw new Exception("Error executing delete statement: " . print_r(sqlsrv_errors(), true));
        }

        // Return success response
        echo json_encode(["success" => true, "message" => "Party area deleted successfully."]);
    } catch (Exception $e) {
        // Return error response
        echo json_encode(["error" => $e->getMessage()]);
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
function create_BDExpReqDetails($conn) {
    // Get input data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid input data."]);
        return;
    }

    // Validate required fields
    $requiredFields = ['BDExpReqID', 'TeacherName', 'Designation', 'ContactPhone', 'BooksGroupID', 'FinancialYearID', 'ProductID', 'StudentsCount', 'DonationAmount'];
    foreach ($requiredFields as $field) {
        if (!isset($input[$field])) {
            echo json_encode(["error" => "Missing required field: $field"]);
            return;
        }
    }


    $BDExpReqID = $input['BDExpReqID'];

    // Check if the order is already checked (status = 1)
    $sql1 = "SELECT Status FROM sndBDExpReq WHERE BDExpReqID = ?";
    $stmtCheckStatus = sqlsrv_query($conn, $sql1, [$BDExpReqID]);

    if ($stmtCheckStatus === false) {
        echo json_encode(["error" => "Error checking order status: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($stmtCheckStatus, SQLSRV_FETCH_ASSOC);
    if (!$row) {
        echo json_encode(["error" => "sndBDExpID not found"]);
        return;
    }

    $status = $row['Status'];

    if ($status <> 1) {
        echo json_encode(["message" => "BDExpReq detail can't be inserted because it has already been checked"]);
        return;
    }


    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Step 1: Insert into sndBDExpReqDetails
        $sqlInsertDetails = "
            INSERT INTO sndBDExpReqDetails (
                BDExpReqID, TeacherName, Designation, ContactPhone, BooksGroupID, FinancialYearID, ProductID, StudentsCount, DonationAmount, CreatedAt
            ) 
            OUTPUT INSERTED.BDExpReqDetailsID
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE());
        ";

        $paramsInsertDetails = [
            $input['BDExpReqID'],
            $input['TeacherName'],
            $input['Designation'],
            $input['ContactPhone'],
            $input['BooksGroupID'],
            $input['FinancialYearID'],
            $input['ProductID'],
            $input['StudentsCount'],
            $input['DonationAmount']
        ];

        $stmtInsertDetails = sqlsrv_query($conn, $sqlInsertDetails, $paramsInsertDetails);

        if ($stmtInsertDetails === false) {
            throw new Exception("Error inserting BDExpReqDetails: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted BDExpReqDetailsID
        $row = sqlsrv_fetch_array($stmtInsertDetails, SQLSRV_FETCH_ASSOC);
        $BDExpReqDetailsID = $row['BDExpReqDetailsID'] ?? null;

        if (is_null($BDExpReqDetailsID)) {
            throw new Exception("Failed to retrieve the inserted BDExpReqDetailsID.");
        }

        // Step 2: Update TotalAmount in sndBDExpReq
        $sqlUpdateTotalAmount = "
            UPDATE sndBDExpReq
            SET TotalAmount = ISNULL(TotalAmount, 0) + ?
            WHERE BDExpReqID = ?;
        ";

        $paramsUpdateTotalAmount = [
            $input['DonationAmount'],
            $input['BDExpReqID']
        ];

        $stmtUpdateTotalAmount = sqlsrv_query($conn, $sqlUpdateTotalAmount, $paramsUpdateTotalAmount);

        if ($stmtUpdateTotalAmount === false) {
            throw new Exception("Error updating TotalAmount in sndBDExpReq: " . print_r(sqlsrv_errors(), true));
        }

        // Step 3: Check the count of records
        $sqlCheckCount = "
            SELECT COUNT(*) AS RecordCount 
            FROM sndBDExpReqDetails 
            WHERE BDExpReqID = ?;
        ";

        $paramsCheckCount = [$input['BDExpReqID']];
        $stmtCheckCount = sqlsrv_query($conn, $sqlCheckCount, $paramsCheckCount);

        if ($stmtCheckCount === false) {
            throw new Exception("Error checking record count: " . print_r(sqlsrv_errors(), true));
        }

        $rowCount = sqlsrv_fetch_array($stmtCheckCount, SQLSRV_FETCH_ASSOC);
        $recordCount = $rowCount['RecordCount'] ?? 0;

        if ($recordCount > 1) {
            // Step 4: Delete notifications if more than one record exists
            $sqlDeleteNotification = "
                DELETE FROM sndNotificationsGenerate 
                WHERE DataID = ?;
            ";

            $paramsDeleteNotification = [$input['BDExpReqID']];
            $stmtDeleteNotification = sqlsrv_query($conn, $sqlDeleteNotification, $paramsDeleteNotification);

            if ($stmtDeleteNotification === false) {
                throw new Exception("Error deleting notifications: " . print_r(sqlsrv_errors(), true));
            }
			
			 $sqlInsertNotification = "
                INSERT INTO sndNotificationsGenerate (
                    NotificationTables, 
                    DataID, 
                    NotificationTitle, 
                    sndNotificationsID, 
                    NotificationStatus, 
                    NotificationStatusMeans, 
                    NotificationPage,
                    Notifiedby, 
                    NotifiedTo, 
                    NotifiedReadby, 
                    CreatedAt
                )
                SELECT 
                    'sndBDExpReq',
                    j.BDExpReqID, 
                    'BD Expense Approval',
                    3, 
                    0, 
                    CONCAT('Request for Checking ', j.BDExpReqNo , ', Institution Name:', ' - Tk .', j.TotalAmount, ' from ', u.EmpName),
                    'BD Expense Approval',
                    j.UserID, 
                    u.ReportingToUserID, 
                    NULL,
                    GETDATE()
                FROM sndBDExpReq j
                JOIN sndUsers u ON u.UserID = j.UserID
                WHERE j.BDExpReqID = ?;
            ";

            $paramsInsertNotification = [$input['BDExpReqID']];
            $stmtInsertNotification = sqlsrv_query($conn, $sqlInsertNotification, $paramsInsertNotification);

            if ($stmtInsertNotification === false) {
                throw new Exception("Error inserting notification: " . print_r(sqlsrv_errors(), true));
            }
			
        } else {
            // Step 5: Insert new notification if only one record exists
            $sqlInsertNotification = "
                INSERT INTO sndNotificationsGenerate (
                    NotificationTables, 
                    DataID, 
                    NotificationTitle, 
                    sndNotificationsID, 
                    NotificationStatus, 
                    NotificationStatusMeans, 
                    NotificationPage,
                    Notifiedby, 
                    NotifiedTo, 
                    NotifiedReadby, 
                    CreatedAt
                )
                SELECT 
                    'sndBDExpReq',
                    j.BDExpReqID, 
                    'BD Expense Approval',
                    3, 
                    0, 
                    CONCAT('Request for Checking ', j.BDExpReqNo , ', Institution Name:', ' - Tk .', j.TotalAmount, ' from ', u.EmpName),
                    'BD Expense Approval',
                    j.UserID, 
                    u.ReportingToUserID, 
                    NULL,
                    GETDATE()
                FROM sndBDExpReq j
                JOIN sndUsers u ON u.UserID = j.UserID
                WHERE j.BDExpReqID = ?;
            ";

            $paramsInsertNotification = [$input['BDExpReqID']];
            $stmtInsertNotification = sqlsrv_query($conn, $sqlInsertNotification, $paramsInsertNotification);

            if ($stmtInsertNotification === false) {
                throw new Exception("Error inserting notification: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit the transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode(["success" => true, "BDExpReqDetailsID" => $BDExpReqDetailsID]);

    } catch (Exception $e) {
        // Rollback the transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}



function Update_BDExpReq($conn) {
    // Get input data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    // Validate input
    if (!$input || !isset($input['BDExpReqID'])) {
        echo json_encode(["error" => "Invalid input data. 'BDExpReqID' is required."]);
        return;
    }

    // Extract input fields
    $BDExpReqID = $input['BDExpReqID'];
    $BDExpUserID = $input['BDExpUserID'] ?? null;
    $BDExpReqDate = $input['BDExpReqDate'] ?? null;
    $InstitutionTypeID = $input['InstitutionTypeID'] ?? null;
    $InstitutionID = $input['InstitutionID'] ?? null;
    $UserID = $input['UserID'] ?? null;

    // Assign institution type for conditional logic
    $institutionType = $InstitutionTypeID;

    // Begin SQL Server transaction
    sqlsrv_begin_transaction($conn);

    try {
        if ($institutionType == 227) {
            // Use PartyID, null InstitutionID
            $sqlMain = "
                UPDATE sndBDExpReq
                SET 
                    BDExpUserID = ?, 
                    BDExpReqDate = ?, 
                    InstitutionTypeID = ?, 
                    PartyID = ?, 
                    InstitutionID = NULL, 
                    UserID = ?, 
                    ModifiedAt = GETDATE()
                WHERE BDExpReqID = ? AND status = 1;
            ";
            $paramsMain = [
                $BDExpUserID,
                $BDExpReqDate,
                $InstitutionTypeID,
                $InstitutionID,   // Treated as PartyID here
                $UserID,
                $BDExpReqID
            ];
        } else {
            // Use InstitutionID, null PartyID
            $sqlMain = "
                UPDATE sndBDExpReq
                SET 
                    BDExpUserID = ?, 
                    BDExpReqDate = ?, 
                    InstitutionTypeID = ?, 
                    InstitutionID = ?, 
                    PartyID = NULL,
                    UserID = ?, 
                    ModifiedAt = GETDATE()
                WHERE BDExpReqID = ? AND status = 1;
            ";
            $paramsMain = [
                $BDExpUserID,
                $BDExpReqDate,
                $InstitutionTypeID,
                $InstitutionID,
                $UserID,
                $BDExpReqID
            ];
        }

        // Execute the update
        $stmtMain = sqlsrv_query($conn, $sqlMain, $paramsMain);

        if ($stmtMain === false) {
            throw new Exception("Error updating BDExpReq: " . print_r(sqlsrv_errors(), true));
        }

        // Commit transaction
        sqlsrv_commit($conn);

        echo json_encode(["success" => true, "BDExpReqID" => $BDExpReqID]);

    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function Update_BDExpReqAll($conn) {
    // Get input data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid input data."]);
        return;
    }

    // Extract main record and details from input
    $BDExpReq = $input['BDExpReq'] ?? null;
    $BDExpReqDetails = $input['BDExpReqDetails'] ?? [];

    if (!$BDExpReq || !isset($BDExpReq['BDExpReqID']) || !is_array($BDExpReqDetails)) {
        echo json_encode(["error" => "Invalid structure for BDExpReq or BDExpReqDetails."]);
        return;
    }

    $BDExpReqID = $BDExpReq['BDExpReqID'];

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Update the main record
        $sqlMain = "
            UPDATE sndBDExpReq
            SET 
                BDExpReqNo = ?, 
                BDExpUserID = ?, 
                BDExpReqDate = ?, 
                InstitutionTypeID = ?, 
                InstitutionID = ?, 
                TotalAmount = ?, 
                UserID = ?, 
                ModifiedAt = GETDATE()
            WHERE BDExpReqID = ?;
        ";
        $paramsMain = [
            $BDExpReq['BDExpReqNo'],
            $BDExpReq['BDExpUserID'],
            $BDExpReq['BDExpReqDate'],
            $BDExpReq['InstitutionTypeID'],
            $BDExpReq['InstitutionID'],
            $BDExpReq['TotalAmount'],
            $BDExpReq['UserID'],
            $BDExpReqID
        ];

        $stmtMain = sqlsrv_query($conn, $sqlMain, $paramsMain);

        if ($stmtMain === false) {
            throw new Exception("Error updating BDExpReq: " . print_r(sqlsrv_errors(), true));
        }

        // Delete existing details for the record
        $sqlDeleteDetails = "DELETE FROM sndBDExpReqDetails WHERE BDExpReqID = ?";
        $stmtDeleteDetails = sqlsrv_query($conn, $sqlDeleteDetails, [$BDExpReqID]);

        if ($stmtDeleteDetails === false) {
            throw new Exception("Error deleting old BDExpReqDetails: " . print_r(sqlsrv_errors(), true));
        }

        // Insert updated details records
        $sqlDetails = "
            INSERT INTO sndBDExpReqDetails (
                BDExpReqID, TeacherName, Designation, ContactPhone, FinancialYearID, BooksGroupID, ProductID, StudentsCount, DonationAmount, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE());
        ";

        foreach ($BDExpReqDetails as $index => $detail) {
            $paramsDetails = [
                $BDExpReqID,
                $detail['TeacherName'],
                $detail['Designation'],
                $detail['ContactPhone'],
                $detail['FinancialYearID'],
                $detail['BooksGroupID'],
                $detail['ProductID'],
                $detail['StudentsCount'],
                $detail['DonationAmount']
            ];

            $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsDetails);

            if ($stmtDetails === false) {
                throw new Exception("Error inserting BDExpReqDetails: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode(["success" => true, "BDExpReqID" => $BDExpReqID]);

    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function create_BDExpReqMaster($conn) {
    // Get input data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid input data."]);
        return;
    }

    // Validate required fields
    $requiredFields = ['BDExpReqNo', 'BDExpUserID', 'BDExpReqDate', 'InstitutionTypeID', 'InstitutionID', 'UserID'];
    foreach ($requiredFields as $field) {
        if (!isset($input[$field]) || $input[$field] === null || $input[$field] === '') {
            echo json_encode(["error" => "Missing or empty required field: $field"]);
            return;
        }
    }

    // Assign institution type
    $institutionType = $input['InstitutionTypeID'];

    // Adjust PartyID and InstitutionID based on institution type
    if ($institutionType == 227) {
        // NGO or similar – use PartyID
        $partyID = $input['InstitutionID'];
        $institutionID = null;

        $sql = "
            INSERT INTO sndBDExpReq (
                BDExpReqNo, BDExpUserID, BDExpReqDate, InstitutionTypeID, PartyID, TotalAmount, UserID, CreatedAt
            ) 
            OUTPUT INSERTED.BDExpReqID
            VALUES (?, ?, ?, ?, ?, 0, ?, GETDATE());
        ";

        $params = [
            $input['BDExpReqNo'],
            $input['BDExpUserID'],
            $input['BDExpReqDate'],
            $institutionType,
            $partyID,
            $input['UserID']
        ];
    } else {
        // Regular institution – use InstitutionID
        $institutionID = $input['InstitutionID'];
        $partyID = null;

        $sql = "
            INSERT INTO sndBDExpReq (
                BDExpReqNo, BDExpUserID, BDExpReqDate, InstitutionTypeID, InstitutionID, TotalAmount, UserID, CreatedAt
            ) 
            OUTPUT INSERTED.BDExpReqID
            VALUES (?, ?, ?, ?, ?, 0, ?, GETDATE());
        ";

        $params = [
            $input['BDExpReqNo'],
            $input['BDExpUserID'],
            $input['BDExpReqDate'],
            $institutionType,
            $institutionID,
            $input['UserID']
        ];
    }

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating BDExpReq", "details" => sqlsrv_errors()]);
        return;
    }

    // Fetch the inserted BDExpReqID
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $BDExpReqID = $row['BDExpReqID'] ?? null;

    if (is_null($BDExpReqID)) {
        echo json_encode(["error" => "Failed to retrieve the inserted BDExpReqID."]);
        return;
    }

    // Return success response
    echo json_encode(["success" => true, "BDExpReqID" => $BDExpReqID]);
}

function Get_InstitutionTeacherDesigMobile($conn, $InstitutionDetailsID) {
    $sql = "SELECT Designation, ContactPhone FROM sndInstitutionDetails WHERE InstitutionDetailsID = ?";
    $params = [$InstitutionDetailsID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500); // Set HTTP status code for server error
        echo json_encode(["error" => "Error fetching data: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the data
    $TeacherInfo = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $TeacherInfo[] = [
            "Designation" => $row['Designation'],
            "ContactPhone" => $row['ContactPhone']
        ];
    }

    // Return the response
    if (empty($TeacherInfo)) {
        http_response_code(404); // Set HTTP status code for not found
        echo json_encode(["message" => "No data found for the given InstitutionDetailsID."]);
    } else {
        http_response_code(200); // Set HTTP status code for success
        echo json_encode(["TeacherInfo" => $TeacherInfo]);
    }
}


function create_BDExpReqAll($conn) {
    // Get input data from the request body
    $input = json_decode(file_get_contents('php://input'), true);

    if (!$input) {
        echo json_encode(["error" => "Invalid input data."]);
        return;
    }

    // Extract main record and details from input
    $BDExpReq = $input['BDExpReq'] ?? null;
    $BDExpReqDetails = $input['BDExpReqDetails'] ?? [];

    if (!$BDExpReq || !is_array($BDExpReqDetails)) {
        echo json_encode(["error" => "Invalid structure for BDExpReq or BDExpReqDetails."]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert the main record
        $sqlMain = "
            INSERT INTO sndBDExpReq (
                BDExpReqNo, BDExpUserID, BDExpReqDate, InstitutionTypeID, InstitutionID, TotalAmount, UserID, CreatedAt
            ) 
            OUTPUT INSERTED.BDExpReqID
            VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE())";

        $paramsMain = [
            $BDExpReq['BDExpReqNo'],
            $BDExpReq['BDExpUserID'],
            $BDExpReq['BDExpReqDate'],
            $BDExpReq['InstitutionTypeID'],
            $BDExpReq['InstitutionID'],
            $BDExpReq['TotalAmount'],
            $BDExpReq['UserID']
        ];

        $stmtMain = sqlsrv_query($conn, $sqlMain, $paramsMain);

        if ($stmtMain === false) {
            throw new Exception("Error creating BDExpReq: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted BDExpReqID
        $row = sqlsrv_fetch_array($stmtMain, SQLSRV_FETCH_ASSOC);
        $BDExpReqID = $row['BDExpReqID'] ?? null;

        if (is_null($BDExpReqID)) {
            throw new Exception("BDExpReqID is null. Check if the insert was successful.");
        }

        // Insert details records
        $sqlDetails = "
            INSERT INTO sndBDExpReqDetails (
                BDExpReqID, TeacherName, Designation, ContactPhone, FinancialYearID, BooksGroupID, ProductID, StudentsCount, DonationAmount, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE());
        ";

        foreach ($BDExpReqDetails as $index => $detail) {
            $requiredKeys = [
                'TeacherName', 'Designation', 'ContactPhone',
                'FinancialYearID', 'BooksGroupID',
                'ProductID', 'StudentsCount', 'DonationAmount'
            ];

            foreach ($requiredKeys as $key) {
                if (!isset($detail[$key])) {
                    throw new Exception("Missing required field '$key' in BDExpReqDetails at index $index.");
                }
            }

            $paramsDetails = [
                $BDExpReqID,
                $detail['TeacherName'],
                $detail['Designation'],
                $detail['ContactPhone'],
                $detail['FinancialYearID'],
                $detail['BooksGroupID'],
                $detail['ProductID'],
                $detail['StudentsCount'],
                $detail['DonationAmount']
            ];

            $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsDetails);

            if ($stmtDetails === false) {
                throw new Exception("Error inserting BDExpReqDetails: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode(["success" => true, "BDExpReqID" => $BDExpReqID]);

    } catch (Exception $e) {
        // Rollback transaction on error
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
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

function create_sndApprovalDetailsVisitEntry($conn,$VisitPlanID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['VisitPlanID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$VisitPlanID = $input['VisitPlanID'];
$CheckedComments = $input['CheckedComments'] ?? null; // Allow null for CheckedComments
$AuthComments = $input['AuthComments'] ?? null; // Allow null for AuthComments
$AppComments = $input['AppComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT EAppStatus FROM sndVisitPlans WHERE VisitPlanID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$VisitPlanID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "MR not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['EAppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndVisitPlansEntry',
            'ApprovalTypeID' => $VisitPlanID,
			'CheckedComments' => $CheckedComments,
            'AuthComments' => $AuthComments,
            'AppComments' => $AppComments,
            'CanclledComments' => '', // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];


        // Determine new status based on current AppStatus
        if ($currentAppStatus == 1) {
            $newAppStatus = 2;
            $newStatus = 2;
        } elseif ($currentAppStatus == 2) {
            $newAppStatus = 3;
            $newStatus = 3;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for VisitPlanID $VisitPlanID"]);
            return;
        }


      
        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, 
                CheckedComments, AuthComments, AppComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
			$approvalData['CheckedComments'],
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

        // Step 5: Update sndVisitPlans
        $sqlUpdateSalesOrder = "UPDATE sndVisitPlans SET EStatus = ?, EAppStatus = ? WHERE VisitPlanID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $VisitPlanID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update Money Receipt.", "details" => sqlsrv_errors()]);
            return;
        }

        echo json_encode(["success" => true, "message" => "Approval details created and Money Receipt updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function create_sndApprovalDetailsMR($conn,$MRID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['MRID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$MRID = $input['MRID'];
$CheckedComments = $input['CheckedComments'] ?? null; // Allow null for CheckedComments
$AuthComments = $input['AuthComments'] ?? null; // Allow null for AuthComments
$AppComments = $input['AppComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus, PartyID, AmountReceived FROM sndMoneyReceipt WHERE MRID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$MRID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "MR not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $PartyID = $row['PartyID'];
        $AmountReceived = $row['AmountReceived'];

 // Step 3: Get the current AppStatus of the SalesOrder
 $sqlGetPartyMobile = "SELECT PartyName, ContactNumber FROM sndPartyMaster WHERE PartyID = ?";
 $stmtGetPartyMobile = sqlsrv_query($conn, $sqlGetPartyMobile, [$PartyID]);

 if ($stmtGetPartyMobile === false || !($row = sqlsrv_fetch_array($stmtGetPartyMobile, SQLSRV_FETCH_ASSOC))) {
     echo json_encode(["error" => "MR not found or query failed.", "details" => sqlsrv_errors()]);
     return;
 }
 $PartyName = $row['PartyName'];
 $ContactNumber = $row['ContactNumber'];


        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndMoneyReceipt',
            'ApprovalTypeID' => $MRID,
			'CheckedComments' => $CheckedComments,
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

            //  sms code here

        /*    call sms function to pass following message 
            1. $AmountReceived  
            2. $PartyName
            3. $ContactNumber
        */    

         // Format contact number if needed
        $formattedContactNumber = $ContactNumber;

        // Send SMS notification
        $smsResponse = send_sms($formattedContactNumber, $PartyName, $AmountReceived);

            // end sms code
        } elseif ($currentAppStatus == 3) {
            // Approval stage
            $approvalData['AppStatus'] = 3;
            $newAppStatus = 4;
            $newStatus = 4;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for MRID $MRID"]);
            return;
        }

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, 
                CheckedComments, AuthComments, AppComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
			$approvalData['CheckedComments'],
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

        // Step 5: Update sndMoneyReceipt
        $sqlUpdateSalesOrder = "UPDATE sndMoneyReceipt SET Status = ?, AppStatus = ? WHERE MRID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $MRID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update Money Receipt.", "details" => sqlsrv_errors()]);
            return;
        }

        echo json_encode(["success" => true, "message" => "Approval details created and Money Receipt updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function send_sms($contactNumber, $partyName, $amount) {
    $url = "https://880sms.com/smsapips";

    // Convert name and number
    $partyNameBn = en_to_bn_name($partyName);
    $amountBn = en_to_bn_number($amount);

    // Bangla message
    $banglaMessage = "ধন্যবাদ $partyNameBn, আপনি $amountBn টাকা প্রদান করেছেন।";

    $data = [
        "api_key"   => "C2007980603b86c83f01b3.07258076",
        "type"      => "text",
        "contacts"  => $contactNumber,
        "senderid"  => "Anupam",
        "purpose"   => "transaction",
        "msg"       => $banglaMessage,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

function en_to_bn_number($number) {
    $bn_digits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    return strtr($number, ['0'=>'০','1'=>'১','2'=>'২','3'=>'৩','4'=>'৪','5'=>'৫','6'=>'৬','7'=>'৭','8'=>'৮','9'=>'৯']);
}

function en_to_bn_name($text) {
    // Very basic transliteration for common names – expand as needed
    $map = [
        'a' => 'এ', 'b' => 'বি', 'c' => 'সি', 'd' => 'ডি', 'e' => 'ই', 'f' => 'এফ', 'g' => 'জি',
        'h' => 'এইচ', 'i' => 'আই', 'j' => 'জে', 'k' => 'কে', 'l' => 'এল', 'm' => 'এম', 'n' => 'এন',
        'o' => 'ও', 'p' => 'পি', 'q' => 'কিউ', 'r' => 'আর', 's' => 'এস', 't' => 'টি', 'u' => 'ইউ',
        'v' => 'ভি', 'w' => 'ডাবলিউ', 'x' => 'এক্স', 'y' => 'ওয়াই', 'z' => 'জেড',
        ' ' => ' '
    ];

    $result = '';
    $text = strtolower($text);
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $result .= $map[$char] ?? $char;
    }
    return $result;
}



function get_MoneyReceiptCompleteRejectCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		
	

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT MRID
      ,MRNo
      ,convert(char(11),MRDate,120) as MRDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndMoneyReceipt.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndMoneyReceipt.status and statustables = 'sndMoneyReceipt') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndMoneyReceipt.AppStatus and Approvaltables = 'sndMoneyReceipt') as AppStatus
      ,FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived
      ,(select EmpName from sndUsers where userid = sndMoneyReceipt.ReceivedByUserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].sndMoneyReceipt 
  where Status in (4,6) 
  order by MRID desc";

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

function get_MoneyReceiptComplete($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		
	
if (in_array($UserID, [2851,69,1718,1716])) { 
    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
            MRID,
    CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
      MRNo
      ,convert(char(11),MRDate,120) as MRDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndMoneyReceipt.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndMoneyReceipt.status and statustables = 'sndMoneyReceipt') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndMoneyReceipt.AppStatus and Approvaltables = 'sndMoneyReceipt') as AppStatus
      ,FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived
      ,(select EmpName from sndUsers where userid = sndMoneyReceipt.ReceivedByUserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].sndMoneyReceipt 
  where Status =4 
  order by MRID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

} else {

    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
            MRID,
    CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
      MRNo
      ,convert(char(11),MRDate,120) as MRDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndMoneyReceipt.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndMoneyReceipt.status and statustables = 'sndMoneyReceipt') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndMoneyReceipt.AppStatus and Approvaltables = 'sndMoneyReceipt') as AppStatus
      ,FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived
      ,(select EmpName from sndUsers where userid = sndMoneyReceipt.ReceivedByUserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].sndMoneyReceipt 
  where Status =4 
  order by MRID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

}

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

function get_MoneyReceiptReject($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		
	

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
           ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
        MRID,
         CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
      MRNo
      ,convert(char(11),MRDate,120) as MRDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndMoneyReceipt.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndMoneyReceipt.status and statustables = 'sndMoneyReceipt') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndMoneyReceipt.AppStatus and Approvaltables = 'sndMoneyReceipt') as AppStatus
      ,FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived
      ,(select EmpName from sndUsers where userid = sndMoneyReceipt.ReceivedByUserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].sndMoneyReceipt 
  where Status =5
  order by MRID desc";

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

function get_MoneyReceiptCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		
	

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
           ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
        MRID,
         CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
      MRNo
      ,convert(char(11),MRDate,120) as MRDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndMoneyReceipt.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndMoneyReceipt.status and statustables = 'sndMoneyReceipt') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndMoneyReceipt.AppStatus and Approvaltables = 'sndMoneyReceipt') as AppStatus
      ,FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived
      ,(select EmpName from sndUsers where userid = sndMoneyReceipt.ReceivedByUserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Authorized By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select AreaID from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndMoneyReceipt'
and AppStatusMeans = 'Approved By') and (select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
in (select distinct areaid from sndMapEmpRegionRegionView where UserID = ?)
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].sndMoneyReceipt 
  where Status = 6
  order by MRID desc";

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



// Function to get all receipts
function get_moneyreceipts($conn) {
    $sql = "select 
     ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
    MRID,
    CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
    MRNo, 
    PartyID,
	Status,
	(select Statusmeans from sndStatus where status = sndMoneyReceipt.status and statustables = 'sndMoneyReceipt') as StatusName, 
	Appstatus,
    (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) AS PartyName,
    convert(char(11),MRDate,120) as MRDate, FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived, dbo.fnNumberToWords(AmountReceived) as InWord,PaymentMethodID,
    (select PMName from sndPaymentMethod where sndPaymentMethod.PaymentMethodID = sndMoneyReceipt.PaymentMethodID) as  PaymentMethod,
	case when  
	(select PMDName from sndPaymentMethodDetails where sndPaymentMethodDetails.PaymentMethodID = sndMoneyReceipt.PaymentMethodID 
	and sndPaymentMethodDetails.PaymentMethodDetailsID = sndMoneyReceipt.PaymentMethodDetailsID) = 'Others' then
	remarks else
	(select PMDName from sndPaymentMethodDetails where sndPaymentMethodDetails.PaymentMethodID = sndMoneyReceipt.PaymentMethodID 
	and sndPaymentMethodDetails.PaymentMethodDetailsID = sndMoneyReceipt.PaymentMethodDetailsID)
	end as  PaymentMethodDetails, 
	(select PMDNameDetails from sndPaymentMethodDetails where sndPaymentMethodDetails.PaymentMethodID = sndMoneyReceipt.PaymentMethodID 
	and sndPaymentMethodDetails.PaymentMethodDetailsID = sndMoneyReceipt.PaymentMethodDetailsID) as  PaymentMethodDetailsAcc, 
    ReceivedByUserID, AccName, AccNumber, ChequeNumber,Remarks, convert(char(11),CreatedAt,120) as CreatedAt,convert(char(11),ModifiedAt,120) as ModifiedAt 
    from sndMoneyReceipt order by MRID desc";
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

function get_moneyreceipts_users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) {  

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY MRID) AS SL,
    MRID,
    CONCAT(MRNo, ' - Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) AS MRInfo1,
    CONVERT(CHAR(11), MRDate, 120) AS MRInfo2,
    P.PartyName AS MRInfo3,
    MRNo,
    M.PartyID,
    M.Status,
    ChequeDate,
    S.Statusmeans AS StatusName,
    Appstatus,
    P.PartyName,
    CONVERT(CHAR(11), MRDate, 120) AS MRDate,
    FORMAT(ISNULL(AmountReceived, 0), 'N2') AS AmountReceived,
    dbo.fnNumberToWords(AmountReceived) AS InWord,
    M.PaymentMethodID,
    PM.PMName AS PaymentMethod,
    CASE 
        WHEN PMD.PMDName = 'Others' THEN M.Remarks
        ELSE PMD.PMDName
    END AS PaymentMethodDetails,
    PMD.PMDNameDetails AS PaymentMethodDetailsAcc,
    ReceivedByUserID,
    AccName,
    AccNumber,
    ChequeNumber,
    Remarks,
    CONVERT(CHAR(11), M.CreatedAt, 120) AS CreatedAt,
    CONVERT(CHAR(11), M.ModifiedAt, 120) AS ModifiedAt
FROM 
    sndMoneyReceipt M
LEFT JOIN 
    sndPartyMaster P ON P.PartyID = M.PartyID
LEFT JOIN 
    sndStatus S ON S.Status = M.Status AND S.StatusTables = 'sndMoneyReceipt'
LEFT JOIN 
    sndPaymentMethod PM ON PM.PaymentMethodID = M.PaymentMethodID
LEFT JOIN 
    sndPaymentMethodDetails PMD ON PMD.PaymentMethodID = M.PaymentMethodID 
                                 AND PMD.PaymentMethodDetailsID = M.PaymentMethodDetailsID
    order by MRID desc";

    $stmt = sqlsrv_query($conn, $sql);

    
} else {

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY MRID) AS SL,
    MRID,
    CONCAT(MRNo, ' - Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) AS MRInfo1,
    CONVERT(CHAR(11), MRDate, 120) AS MRInfo2,
    P.PartyName AS MRInfo3,
    MRNo,
    M.PartyID,
    M.Status,
    ChequeDate,
    S.Statusmeans AS StatusName,
    Appstatus,
    P.PartyName,
    CONVERT(CHAR(11), MRDate, 120) AS MRDate,
    FORMAT(ISNULL(AmountReceived, 0), 'N2') AS AmountReceived,
    dbo.fnNumberToWords(AmountReceived) AS InWord,
    M.PaymentMethodID,
    PM.PMName AS PaymentMethod,
    CASE 
        WHEN PMD.PMDName = 'Others' THEN M.Remarks
        ELSE PMD.PMDName
    END AS PaymentMethodDetails,
    PMD.PMDNameDetails AS PaymentMethodDetailsAcc,
    ReceivedByUserID,
    AccName,
    AccNumber,
    ChequeNumber,
    Remarks,
    CONVERT(CHAR(11), M.CreatedAt, 120) AS CreatedAt,
    CONVERT(CHAR(11), M.ModifiedAt, 120) AS ModifiedAt
FROM 
    sndMoneyReceipt M
LEFT JOIN 
    sndPartyMaster P ON P.PartyID = M.PartyID
LEFT JOIN 
    sndStatus S ON S.Status = M.Status AND S.StatusTables = 'sndMoneyReceipt'
LEFT JOIN 
    sndPaymentMethod PM ON PM.PaymentMethodID = M.PaymentMethodID
LEFT JOIN 
    sndPaymentMethodDetails PMD ON PMD.PaymentMethodID = M.PaymentMethodID 
                                 AND PMD.PaymentMethodDetailsID = M.PaymentMethodDetailsID
   where ReceivedByUserID =?
   order by MRID desc";


   $stmt = sqlsrv_query($conn, $sql, [$UserID]);

}

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


function get_PaymentMethodCash($conn, $PaymentMethodID) {
    // Validate the input parameter
    if (empty($PaymentMethodID)) {
        echo json_encode(["error" => "PaymentMethodID is required"]);
        return;
    }

    // SQL query to fetch payment method details
    $sql = "SELECT 
                PaymentMethodDetailsID, 
                CASE 
        WHEN PMDNameDetails IS NOT NULL AND PMDNameDetails <> '' 
        THEN PMDName + ' - ' + PMDNameDetails
        ELSE PMDName
    END AS PMDName,
                PMDNameDetails 
            FROM 
                sndPaymentMethodDetails 
            WHERE 
                PaymentMethodID = ?";
    
    // Prepare and execute the query with the parameter
    $params = [$PaymentMethodID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check for query execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching payment method details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the results
    $paymentMethods = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $paymentMethods[] = $row;
    }

    // Return the results in JSON format
    echo json_encode($paymentMethods);
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
    // Query to fetch money receipt details
    $sql = "
        SELECT 
    MRID,
    CONCAT(MRNo,' ',CONVERT(CHAR(11), MRDate, 120)) AS MRInfo1,
    (SELECT PartyName 
     FROM sndPartyMaster 
     WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) AS MRInfo2,
    FORMAT(ISNULL(AmountReceived, 0), 'N2') AS MRInfo3,
    MRNo, 
    PartyID,
    (SELECT PartyName 
     FROM sndPartyMaster 
     WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) AS PartyName,
    (SELECT Address 
     FROM sndPartyMaster 
     WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) AS PartyAddress,
    CONVERT(CHAR(11), MRDate, 120) AS MRDate, 
    FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived,
    dbo.fnNumberToWords(AmountReceived) as InWord,
    AppStatus,
    Status,
    PaymentMethodID,
    (SELECT PMName 
     FROM sndPaymentMethod 
     WHERE sndPaymentMethod.PaymentMethodID = sndMoneyReceipt.PaymentMethodID) AS PaymentMethod, 
    PaymentMethodDetailsID,
    CASE 
        WHEN (SELECT PMDName 
              FROM sndPaymentMethodDetails 
              WHERE sndPaymentMethodDetails.PaymentMethodID = sndMoneyReceipt.PaymentMethodID 
              AND sndPaymentMethodDetails.PaymentMethodDetailsID = sndMoneyReceipt.PaymentMethodDetailsID) = 'Others' 
        THEN Remarks 
        ELSE 
            (SELECT PMDName 
             FROM sndPaymentMethodDetails 
             WHERE sndPaymentMethodDetails.PaymentMethodID = sndMoneyReceipt.PaymentMethodID 
             AND sndPaymentMethodDetails.PaymentMethodDetailsID = sndMoneyReceipt.PaymentMethodDetailsID)
    END AS PaymentMethodDetails,
    (SELECT PMDNameDetails 
     FROM sndPaymentMethodDetails 
     WHERE sndPaymentMethodDetails.PaymentMethodDetailsID = sndMoneyReceipt.PaymentMethodDetailsID) AS PaymentMethodDetailsAcc, 
    AccName, AccNumber, ChequeNumber, Remarks,
    ReceivedByUserID,
    CONCAT(
        (SELECT EmpName 
         FROM sndUsers 
         WHERE UserID = sndMoneyReceipt.ReceivedByUserID), ', ',
        (SELECT Designation 
         FROM sndUserView 
         WHERE UserID = sndMoneyReceipt.ReceivedByUserID)
    ) AS DepositEmpName,
    (SELECT EmpName 
     FROM sndUsers 
     WHERE UserID = sndMoneyReceipt.ReceivedByUserID) AS DepEmpName,
    (SELECT Designation 
     FROM sndUserView 
     WHERE UserID = sndMoneyReceipt.ReceivedByUserID) AS Designation,
    (SELECT STUFF(
        (SELECT ' | ' + CONCAT(DistrictName, ', ', ThanaName)
         FROM sndMapEmpRegion 
         WHERE UserID = sndMoneyReceipt.ReceivedByUserID 
         FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 3, ''
    )) AS Location,
    CONVERT(CHAR(11), CreatedAt, 120) AS CreatedAt,
    CONVERT(CHAR(11), ModifiedAt, 120) AS ModifiedAt 
FROM 
    sndMoneyReceipt 
        WHERE 
            MRID = ?
    ";

    // Query to fetch approval details
    $sqlApprovals = "
        SELECT
            MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CheckedDate,
            MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS CheckedBy,
            MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.CheckedComments, '') END) AS CheckedComments,

            MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
            MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
            MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,

            MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
            MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
            MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.AppComments, '') END) AS AppComments,

            MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
            MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
            MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,

            MAX(CASE WHEN d.AppStatus = 6 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
            MAX(CASE WHEN d.AppStatus = 6 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
            MAX(CASE WHEN d.AppStatus = 6 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
        FROM 
            sndApprovalDetails d
        INNER JOIN 
            sndUserView u ON d.UserID = u.UserID
        WHERE 
            d.ApprovalType = 'sndMoneyReceipt' 
            AND d.ApprovalTypeID = ?
    ";

    // Execute the main money receipt query
    $params = [$MRID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $receipt = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if (!$receipt) {
        echo json_encode(["error" => "Receipt not found"]);
        return;
    }

    // Execute the approval details query
    $stmtApprovals = sqlsrv_query($conn, $sqlApprovals, $params);

    if ($stmtApprovals === false) {
        echo json_encode(["error" => "Error fetching approvals: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $approvalDetails = sqlsrv_fetch_array($stmtApprovals, SQLSRV_FETCH_ASSOC);

    // Combine receipt and approval details
    $result = [
        "receipt" => $receipt,
        "Approvals" => $approvalDetails
    ];

    // Return JSON response
    echo json_encode($result);
}

// Function to create a receipt
function create_moneyreceipt($conn) {
    // Decode the JSON payload
    $data = json_decode(file_get_contents("php://input"), true);

    // Prepare SQL query
    $sql = "INSERT INTO sndMoneyReceipt (
           [MRNo],
           [PartyID],
           [MRDate],
           [AmountReceived],
           [InWord],
           [PaymentMethodID],
           [PaymentMethodDetailsID],
           [ReceivedByUserID],
           [AccName],
           [AccNumber],
           [ChequeNumber],
           [ChequeDate],
           [Remarks],
           [CreatedAt])
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, GETDATE())";

    // Set values for optional fields or default to null
    $accName = $data['AccName'] ?? null; // Default to null if not provided
    $accNumber = $data['AccNumber'] ?? null;
   $chequeNumber = $data['ChequeNumber'] ?? null;
   $ChequeDate = $data['ChequeDate'] ?? null;
    $remarks = $data['Remarks'] ?? null;

    // Prepare parameters
    $params = [
        $data['MRNo'],
        $data['PartyID'],
        $data['MRDate'],
        $data['AmountReceived'],
        $data['InWord'],
        $data['PaymentMethodID'],
        $data['PaymentMethodDetailsID'],
        $data['ReceivedByUserID'],
        $accName,
        $accNumber,
        $chequeNumber,
        $ChequeDate,
        $remarks
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle the result
    if ($stmt) {
        echo json_encode(["success" => "Receipt created successfully"]);
    } else {
        echo json_encode(["error" => "Error creating receipt: " . print_r(sqlsrv_errors(), true)]);
    }
}
// Function to update a receipt
function update_moneyreceipt($conn, $MRID) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Default values for optional fields
    $AccName = isset($data['AccName']) ? $data['AccName'] : null;
    $AccNumber = isset($data['AccNumber']) ? $data['AccNumber'] : null;
    $ChequeNumber = isset($data['ChequeNumber']) ? $data['ChequeNumber'] : null;
    $ChequeDate = isset($data['ChequeDate']) ? $data['ChequeDate'] : null;
    $Remarks = isset($data['Remarks']) ? $data['Remarks'] : null;


    $sql = "UPDATE sndMoneyReceipt 
            SET PartyID = ?, MRDate = ?, AmountReceived = ?, InWord = ?, PaymentMethodID = ?, PaymentMethodDetailsID = ?, AccName = ?, AccNumber = ?, ChequeNumber = ?, ChequeDate =?,Remarks = ?, ReceivedByUserID = ?, ModifiedAt = GETDATE() 
            WHERE MRID = ? and status =1";
    $params = [
        $data['PartyID'], 
        $data['MRDate'], 
        $data['AmountReceived'], 
        $data['InWord'], 
        $data['PaymentMethodID'], 
        $data['PaymentMethodDetailsID'], 
        $AccName, 
        $AccNumber, 
        $ChequeNumber,
        $ChequeDate,
        $Remarks, 
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

function create_sndApprovalDetailsVisitPlan($conn,$VisitPlanID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['VisitPlanID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$VisitPlanID = $input['VisitPlanID'];
$AppComments = $input['AppComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndVisitPlans WHERE VisitPlanID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$VisitPlanID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "VisitPlanID not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndVisitPlans',
            'ApprovalTypeID' => $VisitPlanID,
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
        } else {
            echo json_encode(["error" => "Invalid AppStatus for VisitPlanID $VisitPlanID"]);
            return;
        }

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
    INSERT INTO sndApprovalDetails (
        ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, 
         AppComments, 
        ApprovalDetailsByID, UserID, CreatedAt
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$paramsOrder = [
    $approvalData['ApprovalType'],           // Ensure this is defined
    $approvalData['ApprovalTypeID'],         // Ensure this is defined
    $newAppStatus,
    $approvalData['ApprovalDate'],           // Ensure this is defined
    $approvalData['AppComments'],            // Allow null values
    $approvalData['ApprovalDetailsByID'],    // Ensure this is defined
    $approvalData['UserID'],                 // Ensure this is defined
    $approvalData['CreatedAt']               // Ensure this is defined
];

        $stmtOrder = sqlsrv_query($conn, $sqlInsertApprovalDetails, $paramsOrder);

        if ($stmtOrder === false) {
            echo json_encode(["error" => "Error creating order.", "details" => sqlsrv_errors()]);
            return;
        }

        // Step 5: Update sndMoneyReceipt
        $sqlUpdateSalesOrder = "UPDATE sndVisitPlans SET Status = ?, AppStatus = ? WHERE VisitPlanID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $VisitPlanID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update VisitPlanID.", "details" => sqlsrv_errors()]);
            return;
        }

        echo json_encode(["success" => true, "message" => "Approval details created and VisitPlanID updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function create_sndApprovalDetailsBDExpReq($conn,$VisitPlanID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['BDExpReqID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$BDExpReqID = $input['BDExpReqID'];
$CheckedComments = $input['CheckedComments'] ?? null; // Allow null for CheckedComments
$AuthComments = $input['AuthComments'] ?? null; // Allow null for AuthComments
$AppComments = $input['AppComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndBDExpReq WHERE BDExpReqID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$BDExpReqID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "sndBDExpReq not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndBDExpReq',
            'ApprovalTypeID' => $BDExpReqID,
			'CheckedComments' => $CheckedComments,
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
        } elseif ($currentAppStatus == 3) {
            // Approval stage
            $approvalData['AppStatus'] = 3;
            $newAppStatus = 4;
            $newStatus = 4;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for BDExpReqID $BDExpReqID"]);
            return;
        }

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
    INSERT INTO sndApprovalDetails (
        ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, 
        CheckedComments, AuthComments, AppComments, CanclledComments,
        ApprovalDetailsByID, UserID, CreatedAt
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$paramsOrder = [
    $approvalData['ApprovalType'],           // Ensure this is defined
    $approvalData['ApprovalTypeID'],         // Ensure this is defined
    $newAppStatus,
    $approvalData['ApprovalDate'],           // Ensure this is defined
    $approvalData['CheckedComments'],        // Allow null values
    $approvalData['AuthComments'],           // Allow null values
    $approvalData['AppComments'],            // Allow null values
    $approvalData['CanclledComments'],       // Should be a string, even if empty
    $approvalData['ApprovalDetailsByID'],    // Ensure this is defined
    $approvalData['UserID'],                 // Ensure this is defined
    $approvalData['CreatedAt']               // Ensure this is defined
];

        $stmtOrder = sqlsrv_query($conn, $sqlInsertApprovalDetails, $paramsOrder);

        if ($stmtOrder === false) {
            echo json_encode(["error" => "Error creating order.", "details" => sqlsrv_errors()]);
            return;
        }

        // Step 5: Update sndMoneyReceipt
        $sqlUpdateSalesOrder = "UPDATE sndBDExpReq SET Status = ?, AppStatus = ? WHERE BDExpReqID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $BDExpReqID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateSalesOrder, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update BDExpReq.", "details" => sqlsrv_errors()]);
            return;
        }

        echo json_encode(["success" => true, "message" => "Approval details created and BDExpReq updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function get_BDExpReqApproval($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

    $sql = "
       SELECT 
        ROW_NUMBER() OVER (ORDER BY BDExpReqID) AS SL, 
    BDExpReqID,
    BDExpReqNo AS BDExpInfo1,
    concat(CONVERT(CHAR(11), BDExpReqDate, 120), '-',(
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = sndBDExpReq.UserID
    ))  AS BDExpInfo2,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS BDExpInfo3,
    BDExpReqNo,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpReqDate,
    InstitutionTypeID,
    (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    ) AS InstitutionTypeName,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS InstituteName,
    InstitutionID,
    BDExpUserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = BDExpUserID
    ) AS BDExpUserName,
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    UserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = sndBDExpReq.UserID
    ) AS LogUserName,
    (select Statusmeans from sndStatus where status = sndBDExpReq.status and statustables = 'sndBDExpReq') as StatusName, 
    Status,
    AppStatus,
    CreatedAt,
    ModifiedAt,
    (
        SELECT DISTINCT AppStatusMeans 
        FROM sndApprovals 
        WHERE AppStatus = sndBDExpReq.AppStatus 
          AND ApprovalTables = 'sndBDExpReq'
    ) AS AppStatusMeans,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Checked By'
          )
         
        THEN 'Checked' 
        ELSE 'Not Checked' 
    END AS UserCheckedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Authorized By'
          )
         
        THEN 'Authorized' 
        ELSE 'Not Authorized' 
    END AS UserAuthorizedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Approved By'
          )
          
        THEN 'Approved' 
        ELSE 'Not Approved' 
    END AS UserApprovalStatus
FROM 
    dbo.sndBDExpReq
WHERE 
   ( Status IN (1,2) and
            (sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID = ?)) 
        ) 
            and (select count(*) from sndBDExpReqDetails where sndBDExpReqDetails.BDExpReqID = sndBDExpReq.BDExpReqID)>0
        OR   Status IN (2,3) and (
            sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)) )

		OR   Status IN (3) and (
             sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))
			)
        )
ORDER BY 
    BDExpReqID DESC;
";

/*

WHERE 
    ( Status IN (1) and
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndBDExpReq' AND AppStatus = sndBDExpReq.Status) 
            AND Status = 1 
			and (sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID = ?)) 
        ) 
            and (select count(*) from sndBDExpReqDetails where sndBDExpReqDetails.BDExpReqID = sndBDExpReq.BDExpReqID)>0
        OR   Status IN (2) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndBDExpReq' AND AppStatus = sndBDExpReq.Status) 
            AND Status = 2 
			and sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)) )

		OR   Status IN (3) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndBDExpReq' AND AppStatus = sndBDExpReq.Status) 
            AND Status = 3 
			and sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))
			
			)
        )
ORDER BY 
    BDExpReqID DESC;
";
*/
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID,$UserID, $UserID, $UserID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching data.", "details" => sqlsrv_errors()]);
        return;
    }

    $records = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $records[] = $row;
    }

    echo json_encode($records);
}

function get_BDExpReqCompleteRejectCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

    $sql = "
       SELECT 
    BDExpReqID,
    BDExpReqNo AS BDExpInfo1,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpInfo2,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS BDExpInfo3,
    BDExpReqNo,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpReqDate,
    InstitutionTypeID,
    (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    ) AS InstitutionTypeName,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS InstituteName,
    InstitutionID,
    BDExpUserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = BDExpUserID
    ) AS BDExpUserName,
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    UserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = sndBDExpReq.UserID
    ) AS LogUserName,
    Status,
    AppStatus,
    CreatedAt,
    ModifiedAt,
    (
        SELECT DISTINCT AppStatusMeans 
        FROM sndApprovals 
        WHERE AppStatus = sndBDExpReq.AppStatus 
          AND ApprovalTables = 'sndBDExpReq'
    ) AS AppStatusMeans,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Checked By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Checked' 
        ELSE 'Not Checked' 
    END AS UserCheckedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Authorized By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Authorized' 
        ELSE 'Not Authorized' 
    END AS UserAuthorizedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Approved By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Approved' 
        ELSE 'Not Approved' 
    END AS UserApprovalStatus
FROM 
    dbo.sndBDExpReq
WHERE 
    Status IN (4,5,6)
ORDER BY 
    BDExpReqID DESC;
";

    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching data.", "details" => sqlsrv_errors()]);
        return;
    }

    $records = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $records[] = $row;
    }

    echo json_encode($records);
}



function get_BDExpReqComplete($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

    // Main SQL query
    $sql = "
SELECT 
        ROW_NUMBER() OVER (ORDER BY BDExpReqID) AS SL, 
    BDExpReqID,
    BDExpReqNo AS BDExpInfo1,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpInfo2,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS BDExpInfo3,
    BDExpReqNo,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpReqDate,
    InstitutionTypeID,
    (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    ) AS InstitutionTypeName,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS InstituteName,
    InstitutionID,
    BDExpUserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = BDExpUserID
    ) AS BDExpUserName,
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    UserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = sndBDExpReq.UserID
    ) AS LogUserName,
    (select Statusmeans from sndStatus where status = sndBDExpReq.status and statustables = 'sndBDExpReq') as StatusName, 
    Status,
    AppStatus,
    CreatedAt,
    ModifiedAt,
    (
        SELECT DISTINCT AppStatusMeans 
        FROM sndApprovals 
        WHERE AppStatus = sndBDExpReq.AppStatus 
          AND ApprovalTables = 'sndBDExpReq'
    ) AS AppStatusMeans,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Checked By'
          )
         
        THEN 'Checked' 
        ELSE 'Not Checked' 
    END AS UserCheckedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Authorized By'
          )
         
        THEN 'Authorized' 
        ELSE 'Not Authorized' 
    END AS UserAuthorizedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Approved By'
          )
          
        THEN 'Approved' 
        ELSE 'Not Approved' 
    END AS UserApprovalStatus
FROM 
    dbo.sndBDExpReq
WHERE 
    ( Status IN (4) and
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndBDExpReq' AND AppStatus = sndBDExpReq.Status) 
            AND Status = 4 
			and (sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID = ?)) 
        ) 
            and (select count(*) from sndBDExpReqDetails where sndBDExpReqDetails.BDExpReqID = sndBDExpReq.BDExpReqID)>0
        OR   Status IN (4) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndBDExpReq' AND AppStatus = sndBDExpReq.Status) 
            AND Status = 4 
			and sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)) )

		OR   Status IN (4) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndBDExpReq' AND AppStatus = sndBDExpReq.Status) 
            AND Status = 4 
			and sndBDExpReq.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))
			
			)
        )
ORDER BY 
    BDExpReqID DESC;
    ";

    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID, $UserID, $UserID, $UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching data.", "details" => sqlsrv_errors()]);
        return;
    }

    $records = [];

    // Prepare detail SQL
    $sqlDetails = "
        SELECT 
            ROW_NUMBER() OVER (PARTITION BY BDExpReqID ORDER BY BDExpReqDetailsID) AS SL,
            BDExpReqDetailsID,
            BDExpReqID,
            TeacherName AS BDEDetails1,
            ContactPhone AS BDEDetails2,
            CONCAT(ContactPhone,' - ', (
                SELECT CategoryName 
                FROM sndCategorydata 
                WHERE CategoryType = 'books-category' 
                  AND sndCategorydata.id = BooksGroupID
            )) AS BDEDetails2,
            (
                SELECT ProductName 
                FROM sndProducts 
                WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID
            ) AS BDEDetails3,
            CONCAT('Student - ', StudentsCount,' - Tk. ', DonationAmount) AS BDEDetails4,
            TeacherName,
            Designation,
            ContactPhone,
            FinancialYearID,
            BooksGroupID,
            (
                SELECT CategoryName 
                FROM sndCategorydata 
                WHERE CategoryType = 'books-category' 
                  AND sndCategorydata.id = BooksGroupID
            ) AS BooksGroup,
            ProductID,
            (
                SELECT ProductName 
                FROM sndProducts 
                WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID
            ) AS ProductName,
            StudentsCount,
            DonationAmount
        FROM 
            dbo.sndBDExpReqDetails
        WHERE 
            BDExpReqID = ?
    ";

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $details = [];
        $details_stmt = sqlsrv_query($conn, $sqlDetails, [$row['BDExpReqID']]);
        if ($details_stmt !== false) {
            while ($detailRow = sqlsrv_fetch_array($details_stmt, SQLSRV_FETCH_ASSOC)) {
                $details[] = $detailRow;
            }
        }
        $row['BDExpReqDetails'] = $details;
        $records[] = $row;
    }

    echo json_encode($records);
}


function get_BDExpReqReject($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

    $sql = "
       SELECT 
        ROW_NUMBER() OVER (ORDER BY BDExpReqID) AS SL, 
    BDExpReqID,
    CONCAT(BDExpReqNo,' -', FORMAT(ISNULL(TotalAmount, 0), 'N2')) as BDExpInfo1,
     CONCAT(CONVERT(CHAR(10), BDExpReqDate, 105),' -', (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    )) as BDExpInfo2,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS BDExpInfo3,
    BDExpReqNo,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpReqDate,
    InstitutionTypeID,
    (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    ) AS InstitutionTypeName,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS InstituteName,
    InstitutionID,
    BDExpUserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = BDExpUserID
    ) AS BDExpUserName,
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    UserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = sndBDExpReq.UserID
    ) AS LogUserName,
    Status,
    AppStatus,
     (select Statusmeans from sndStatus where status = sndBDExpReq.status and statustables = 'sndBDExpReq') as StatusName, 
    CreatedAt,
    ModifiedAt,
    (
        SELECT DISTINCT AppStatusMeans 
        FROM sndApprovals 
        WHERE AppStatus = sndBDExpReq.AppStatus 
          AND ApprovalTables = 'sndBDExpReq'
    ) AS AppStatusMeans,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Checked By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Checked' 
        ELSE 'Not Checked' 
    END AS UserCheckedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Authorized By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Authorized' 
        ELSE 'Not Authorized' 
    END AS UserAuthorizedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Approved By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Approved' 
        ELSE 'Not Approved' 
    END AS UserApprovalStatus
FROM 
    dbo.sndBDExpReq
WHERE 
    Status IN (5)
ORDER BY 
    BDExpReqID DESC;
";

    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching data.", "details" => sqlsrv_errors()]);
        return;
    }

    $records = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $records[] = $row;
    }

    echo json_encode($records);
}

function get_BDExpReqCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

    $sql = "
       SELECT 
        ROW_NUMBER() OVER (ORDER BY BDExpReqID) AS SL, 
    BDExpReqID,
    CONCAT(BDExpReqNo,' -', FORMAT(ISNULL(TotalAmount, 0), 'N2')) as BDExpInfo1,
     CONCAT(CONVERT(CHAR(10), BDExpReqDate, 105),' -', (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    )) as BDExpInfo2,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS BDExpInfo3,
    BDExpReqNo,
    CONVERT(CHAR(11), BDExpReqDate, 120) AS BDExpReqDate,
    InstitutionTypeID,
    (
        SELECT CategoryName 
        FROM sndCategorydata 
        WHERE sndCategorydata.ID = sndBDExpReq.InstitutionTypeID 
          AND CategoryType = 'institution-type'
    ) AS InstitutionTypeName,
    (
        SELECT InstitutionName 
        FROM sndInstitutions 
        WHERE InstitutionID = sndBDExpReq.InstitutionID
    ) AS InstituteName,
    InstitutionID,
    BDExpUserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = BDExpUserID
    ) AS BDExpUserName,
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    UserID,
    (
        SELECT EmpName 
        FROM sndUsers 
        WHERE sndUsers.UserID = sndBDExpReq.UserID
    ) AS LogUserName,
    Status,
    (select Statusmeans from sndStatus where status = sndBDExpReq.status and statustables = 'sndBDExpReq') as StatusName, 
    AppStatus,
    CreatedAt,
    ModifiedAt,
    (
        SELECT DISTINCT AppStatusMeans 
        FROM sndApprovals 
        WHERE AppStatus = sndBDExpReq.AppStatus 
          AND ApprovalTables = 'sndBDExpReq'
    ) AS AppStatusMeans,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Checked By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Checked' 
        ELSE 'Not Checked' 
    END AS UserCheckedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Authorized By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Authorized' 
        ELSE 'Not Authorized' 
    END AS UserAuthorizedStatus,
    CASE 
        WHEN AppStatus = (
            SELECT AppStatus 
            FROM sndApprovals 
            WHERE RoleID IN (
                SELECT RoleID 
                FROM sndUserRoleMapping 
                WHERE UserID = ?
            ) 
              AND ApprovalTables = 'sndBDExpReq' 
              AND AppStatusMeans = 'Approved By'
          )
          AND InstitutionID IN (
              SELECT DISTINCT AreaID 
              FROM sndMapEmpRegionRegionView 
              WHERE UserID = ?
          )
        THEN 'Approved' 
        ELSE 'Not Approved' 
    END AS UserApprovalStatus
FROM 
    dbo.sndBDExpReq
WHERE 
    Status IN (6)
ORDER BY 
    BDExpReqID DESC;
";

    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching data.", "details" => sqlsrv_errors()]);
        return;
    }

    $records = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $records[] = $row;
    }

    echo json_encode($records);
}


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
                    (SELECT address FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndSalesOrders.PartyID) AS Address,
                    (SELECT ContactNumber FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndSalesOrders.PartyID) AS ContactNumber,
                    SpecimenUserID,
					CONCAT((SELECT EmpName 
             FROM sndUsers 
             WHERE UserID = sndSalesOrders.SpecimenUserID),', ',(SELECT Designation 
             FROM sndUserView 
             WHERE UserID = sndSalesOrders.SpecimenUserID))  AS SpecimenUserName,
					(SELECT Address FROM sndUsers WHERE sndUsers.UserID = sndSalesOrders.SpecimenUserID) AS SpecimenUserAddress,
					(SELECT Phone FROM sndUsers WHERE sndUsers.UserID = sndSalesOrders.SpecimenUserID) AS SpecimenUserPhone,
					CONCAT((SELECT EmpName 
             FROM sndUsers 
             WHERE UserID = sndSalesOrders.UserID),', ',(SELECT Designation 
             FROM sndUserView 
             WHERE UserID = sndSalesOrders.UserID)) AS UserName,
                    0 as Locations,
                    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
                    UserID,
                    (SELECT StatusMeans FROM sndStatus 
                     WHERE Status = sndSalesOrders.Status 
                       AND StatusTables = 'sndSalesOrders') AS Status,
                    (SELECT DISTINCT AppStatusMeans FROM sndApprovals 
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
                       (SELECT CategoryName FROM sndCategorydata WHERE ID = sndSalesOrderDetails.ProductCategoryID) as SODInfo1,
                       (SELECT ProductName FROM sndProducts WHERE ProductID = sndSalesOrderDetails.ProductID)  as SODInfo2,
                       CONCAT(Quantity,' Pcs', ' @ Tk. ', Price, ' = ', Quantity*Price) as SODInfo3,    
                       SalesOrderDetailID,
                       FinancialYearID,
                       (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndSalesOrderDetails.FinancialYearID) as FinancialYear,
                       ProductCategoryID,
                       (SELECT CategoryName FROM sndCategorydata WHERE ID = sndSalesOrderDetails.ProductCategoryID) AS CategoryName,
                       ProductID,
                       (SELECT ProductName FROM sndProducts WHERE ProductID = sndSalesOrderDetails.ProductID) AS ProductName,
                       CONCAT((SELECT ProductName FROM sndProducts WHERE ProductID = sndSalesOrderDetails.ProductID), ' - ', right((select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndSalesOrderDetails.FinancialYearID),4)) as ProductNameRepo,
                       Quantity,
                       Price,
                       Quantity*Price as Amount,
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

    // Query to fetch approval details for the given SalesOrderID
    $sqlApprovals = "SELECT
        MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
        MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
        MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,

        MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
        MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
        MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AppComments, '') END) AS AppComments,

        MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
        MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
        MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,

        MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
        MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
        MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
    FROM 
        sndApprovalDetails d
    INNER JOIN 
        sndUserView u ON d.UserID = u.UserID
    WHERE 
        d.ApprovalType = 'sndSalesOrders' 
        AND d.ApprovalTypeID = ?";

    $stmtApprovals = sqlsrv_query($conn, $sqlApprovals, $paramsOrder);

    if ($stmtApprovals === false) {
        echo json_encode(["error" => "Error fetching approvals: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $approvals = sqlsrv_fetch_array($stmtApprovals, SQLSRV_FETCH_ASSOC);

    // Combine the order, details, and approvals into a single response
    $response = [
        "order" => $order,
        "orderDetails" => $orderDetails,
        "approvals" => $approvals
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
                    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
                    UserID,
                    (SELECT StatusMeans FROM sndStatus 
                     WHERE Status = sndSalesOrders.Status 
                       AND StatusTables = 'sndSalesOrders') AS Status,
                    (SELECT DISTINCT AppStatusMeans FROM sndApprovals 
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
                       (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndSalesOrderDetails.FinancialYearID) as FinancialYear,
                       ProductCategoryID,
                       (SELECT CategoryName FROM sndCategorydata WHERE ID = sndSalesOrderDetails.ProductCategoryID) AS CategoryName,
                       ProductID,
                       (SELECT ProductName FROM sndProducts WHERE ProductID = sndSalesOrderDetails.ProductID) AS ProductName,
                       (Quantity - isnull(challanQty,0)) as Quantity,
                       Price,
                       CONCAT(Quantity,' Pcs', ' @ Tk. ', Price, ' = ', Quantity*Price) AS RateValue,
                       isnull((select sum(Quantity) from sndStockInOut where sndStockInOut.FinancialYearID = sndSalesOrderDetails.FinancialYearID
					   and sndStockInOut.ProductCategoryID = sndSalesOrderDetails.ProductCategoryID and
					   sndStockInOut.ProductID = sndSalesOrderDetails.ProductID and sndStockInOut.TransactionType = 'Stock-In'),0) -
					   isnull((select sum(Quantity) from sndStockInOut where sndStockInOut.FinancialYearID = sndSalesOrderDetails.FinancialYearID
					   and sndStockInOut.ProductCategoryID = sndSalesOrderDetails.ProductCategoryID and
					   sndStockInOut.ProductID = sndSalesOrderDetails.ProductID and sndStockInOut.TransactionType = 'Stock-Out'),0) as AvailableQty
                   FROM sndSalesOrderDetails
                       WHERE SalesOrderID = ? and sndSalesOrderDetails.status is null or SalesOrderID = ? and sndSalesOrderDetails.status =0";


$paramsDetails = [$SalesOrderID, $SalesOrderID];
$stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsDetails);
  //  $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsOrder);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching order details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $orderDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $orderDetails[] = $row;
    }

    // Query to fetch approval details for the given SalesOrderID
    $sqlApprovals = "SELECT
        MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
        MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
        MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,

        MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
        MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
        MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AppComments, '') END) AS AppComments,

        MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
        MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
        MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,

        MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
        MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
        MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
    FROM 
        sndApprovalDetails d
    INNER JOIN 
        sndUserView u ON d.UserID = u.UserID
    WHERE 
        d.ApprovalType = 'sndSalesOrders' 
        AND d.ApprovalTypeID = ?";

    $stmtApprovals = sqlsrv_query($conn, $sqlApprovals, $paramsOrder);

    if ($stmtApprovals === false) {
        echo json_encode(["error" => "Error fetching approvals: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $approvals = sqlsrv_fetch_array($stmtApprovals, SQLSRV_FETCH_ASSOC);

    // Combine the order, details, and approvals into a single response
    $response = [
        "order" => $order,
        "orderDetails" => $orderDetails,
        "approvals" => $approvals
    ];

    echo json_encode($response);
}

function get_orderforInvoice($conn, $SalesOrderID) {
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
                    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
                    UserID,
                    (SELECT StatusMeans FROM sndStatus 
                     WHERE Status = sndSalesOrders.Status 
                       AND StatusTables = 'sndSalesOrders') AS Status,
                    (SELECT DISTINCT AppStatusMeans FROM sndApprovals 
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
                       0 as AvailableQty
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

    // Query to fetch approval details for the given SalesOrderID
    $sqlApprovals = "SELECT
        MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
        MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
        MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,

        MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
        MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
        MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AppComments, '') END) AS AppComments,

        MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
        MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
        MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,

        MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
        MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
        MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
    FROM 
        sndApprovalDetails d
    INNER JOIN 
        sndUserView u ON d.UserID = u.UserID
    WHERE 
        d.ApprovalType = 'sndSalesOrders' 
        AND d.ApprovalTypeID = ?";

    $stmtApprovals = sqlsrv_query($conn, $sqlApprovals, $paramsOrder);

    if ($stmtApprovals === false) {
        echo json_encode(["error" => "Error fetching approvals: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $approvals = sqlsrv_fetch_array($stmtApprovals, SQLSRV_FETCH_ASSOC);

    // Combine the order, details, and approvals into a single response
    $response = [
        "order" => $order,
        "orderDetails" => $orderDetails,
        "approvals" => $approvals
    ];

    echo json_encode($response);
}



// Function to get all sales orders
function get_salesorders($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
    SalesOrderID
      ,SalesOrderNo as SoInfo1 
      ,convert(char(11),OrderDate,120) as SoInfo2 
      ,CONCAT(FORMAT(ISNULL(TotalAmount, 0), 'N2'), ' - ', (select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders')) as SoInfo3
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as SoInfo4 
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
  where OrderTypeID = 1 
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


function get_salesorders_users($conn, $UserID) {

    if (in_array($UserID, [2851,69,1718,1716])) {

        $sql = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY SalesOrderID DESC) AS SL, 
            SalesOrderID,
            SalesOrderNo AS SoInfo1,
            CONVERT(char(11), OrderDate, 120) AS SoInfo2,
            CONCAT(FORMAT(ISNULL(TotalAmount, 0), 'N2'), ' - ', 
                (SELECT Statusmeans 
                 FROM sndStatus 
                 WHERE status = s.status 
                 AND statustables = 'sndSalesOrders')
            ) AS SoInfo3,
            (SELECT Statusmeans 
             FROM sndStatus 
             WHERE status = s.status 
             AND statustables = 'sndSalesOrders') AS SoInfo4,
            SalesOrderNo,
            CONVERT(char(11), OrderDate, 120) AS OrderDate,
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = s.PartyID) AS PartyName,
            (SELECT Statusmeans 
             FROM sndStatus 
             WHERE status = s.status 
             AND statustables = 'sndSalesOrders') AS Status,
            (SELECT DISTINCT AppStatusmeans 
             FROM sndApprovals 
             WHERE AppStatus = s.AppStatus 
             AND Approvaltables = 'sndSalesOrders') AS AppStatus,
            FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
			CONCAT((SELECT EmpName 
             FROM sndUsers 
             WHERE UserID = s.UserID),', ',(SELECT Designation 
             FROM sndUserView 
             WHERE UserID = s.UserID)) as LogUserName,
			 (SELECT Designation 
             FROM sndUserView 
             WHERE UserID = s.UserID) AS Designation,
            CASE 
                WHEN EXISTS (
                    SELECT 1 
                    FROM sndSalesOrderDetails d 
                    WHERE d.SalesOrderID = s.SalesOrderID
                ) THEN 'True'
                ELSE 'False'
            END AS DetailsStatus
        FROM sndSalesOrders s
        WHERE s.OrderTypeID = 1
        ORDER BY s.SalesOrderID DESC
        ";

        $stmt = sqlsrv_query($conn, $sql);

    } else {

        $sql = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY SalesOrderID DESC) AS SL, 
            SalesOrderID,
            SalesOrderNo AS SoInfo1,
            CONVERT(char(11), OrderDate, 120) AS SoInfo2,
            CONCAT(FORMAT(ISNULL(TotalAmount, 0), 'N2'), ' - ', 
                (SELECT Statusmeans 
                 FROM sndStatus 
                 WHERE status = s.status 
                 AND statustables = 'sndSalesOrders')
            ) AS SoInfo3,
            (SELECT Statusmeans 
             FROM sndStatus 
             WHERE status = s.status 
             AND statustables = 'sndSalesOrders') AS SoInfo4,
            SalesOrderNo,
            CONVERT(char(11), OrderDate, 120) AS OrderDate,
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = s.PartyID) AS PartyName,
            (SELECT Statusmeans 
             FROM sndStatus 
             WHERE status = s.status 
             AND statustables = 'sndSalesOrders') AS Status,
            (SELECT DISTINCT AppStatusmeans 
             FROM sndApprovals 
             WHERE AppStatus = s.AppStatus 
             AND Approvaltables = 'sndSalesOrders') AS AppStatus,
            FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
            CONCAT((SELECT EmpName 
             FROM sndUsers 
             WHERE UserID = s.UserID),', ',(SELECT Designation 
             FROM sndUserView 
             WHERE UserID = s.UserID)) as LogUserName,
            CASE 
                WHEN EXISTS (
                    SELECT 1 
                    FROM sndSalesOrderDetails d 
                    WHERE d.SalesOrderID = s.SalesOrderID
                ) THEN 'True'
                ELSE 'False'
            END AS DetailsStatus
        FROM sndSalesOrders s
        WHERE 
            s.OrderTypeID = 1 AND (
                s.UserID = ? OR
                (SELECT RegionID FROM sndPartyMaster WHERE sndPartyMaster.PartyID = s.PartyID) IN (
                    SELECT DISTINCT AreaID FROM sndMapEmpRegionRegionView WHERE UserID = ?
                ) OR
                (SELECT RegionID FROM sndPartyMaster WHERE sndPartyMaster.PartyID = s.PartyID) IN (
                    SELECT DISTINCT AreaID FROM sndMapEmpRegionRegionView 
                    WHERE UserID IN (
                        SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?
                    )
                ) OR
                (SELECT RegionID FROM sndPartyMaster WHERE sndPartyMaster.PartyID = s.PartyID) IN (
                    SELECT DISTINCT AreaID FROM sndMapEmpRegionRegionView 
                    WHERE UserID IN (
                        SELECT UserID FROM sndUsers 
                        WHERE ReportingToUserID IN (
                            SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?
                        )
                    )
                ) OR
                (SELECT RegionID FROM sndPartyMaster WHERE sndPartyMaster.PartyID = s.PartyID) IN (
                    SELECT DISTINCT AreaID FROM sndMapEmpRegionRegionView 
                    WHERE UserID IN (
                        SELECT UserID FROM sndUsers 
                        WHERE ReportingToUserID IN (
                            SELECT UserID FROM sndUsers 
                            WHERE ReportingToUserID IN (
                                SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?
                            )
                        )
                    )
                )
            )
        ORDER BY s.SalesOrderID DESC
        ";

        $params = [$UserID, $UserID, $UserID, $UserID, $UserID];
        $stmt = sqlsrv_query($conn, $sql, $params);
    }

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

    // SQL query with parameterized placeholders
    $sql = "
    SELECT userid,
    ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
    SalesOrderID,
    SalesOrderNo,
    SalesOrderNo AS SoInfo1,
    CONCAT(CONVERT(CHAR(10), OrderDate, 105), ' - ', FORMAT(ISNULL(TotalAmount, 0), 'N2')) AS SoInfo2,
    (SELECT TOP 1 partyname FROM sndPartyMaster WHERE PartyID = sndSalesOrders.PartyID) AS SoInfo3,
    CONVERT(CHAR(11), OrderDate, 120) AS OrderDate, 
    PartyID,
    (SELECT TOP 1 DistrictID FROM sndPartyMaster WHERE PartyID = sndSalesOrders.PartyID) AS DistrictID,
    (SELECT TOP 1 partyname FROM sndPartyMaster WHERE PartyID = sndSalesOrders.PartyID) AS partyname,
    status,
    (SELECT TOP 1 Statusmeans FROM sndStatus WHERE status = sndSalesOrders.status AND StatusTables = 'sndSalesOrders') AS Status,
    (SELECT TOP 1 AppStatusmeans FROM sndApprovals WHERE AppStatus = sndSalesOrders.AppStatus AND ApprovalTables = 'sndSalesOrders') AS AppStatus,
    FORMAT(ISNULL(TotalAmount, 0), 'N2') AS TotalAmount,
    (SELECT TOP 1 EmpName FROM sndUsers WHERE UserID = sndSalesOrders.UserID) AS logUserName,
    AppStatus,
    -- User Authorization Status
    CASE 
        WHEN AppStatus = (
            SELECT TOP 1 AppStatus FROM sndApprovals 
            WHERE RoleID IN (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            AND ApprovalTables = 'sndSalesOrders' 
            AND AppStatusMeans = 'Authorized By'
        ) 
        AND (SELECT TOP 1 DistrictID FROM sndPartyMaster WHERE PartyID = sndSalesOrders.PartyID) 
            IN (SELECT DistrictID FROM sndMapEmpRegion WHERE UserID = ?)
        THEN 'Authrized' 
        ELSE 'Not Authorized' 
    END AS UserAuthorizedSatus,

    -- User Approval Status
    CASE 
        WHEN AppStatus = (
            SELECT TOP 1 AppStatus FROM sndApprovals 
            WHERE RoleID IN (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            AND ApprovalTables = 'sndSalesOrders' 
            AND AppStatusMeans = 'Approved By'
        ) 
        AND (SELECT TOP 1 DistrictID FROM sndPartyMaster WHERE PartyID = sndSalesOrders.PartyID) 
            IN (SELECT DISTINCT DistrictID FROM sndMapEmpRegion WHERE UserID = ?)
        THEN 'Authrized' 
        ELSE 'Not Authorized' 
    END AS UserApprovalSatus

    FROM [dbo].[sndSalesOrders] 
where
		 OrderTypeID = 1 and  Status in (1,2) and userid in (select userid from sndUserView where ReportingToUserID = ?)
	 And (select count(*) from sndSalesOrderDetails sod where sod.SalesOrderID = sndSalesOrders.SalesOrderID)>0
  or OrderTypeID = 1 and  Status in (1,2) and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
    And (select count(*) from sndSalesOrderDetails sod where sod.SalesOrderID = sndSalesOrders.SalesOrderID)>0
  order by SalesOrderID desc";

    // Corrected the parameter count (8 placeholders = 8 values)
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

    // Prepare and execute the query
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
  where 
   OrderTypeID = 1 and  Status in (3,4,5) and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 1 and  Status in (3,4,5) and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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
function get_salesordersComplete($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
      ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', FORMAT(ISNULL(TotalAmount, 0), 'N2')) as SoInfo2
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as SoInfo3
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
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
  where 
 OrderTypeID = 1 and  Status =3 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 1 and  Status =3 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID,  $UserID, $UserID];

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
function get_salesordersReject($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
       ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as SoInfo3
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
  where 
   OrderTypeID = 1 and  Status =4 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 1 and  Status =4 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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
function get_salesordersCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
       ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as SoInfo3
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
  where 
     OrderTypeID = 1 and  Status =5 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 1 and  Status =5 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
      ,isnull(pertialchallanstatus,0) as pertialchallanstatus
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,challanstatus
       ,(select Statusmeans from sndStatus where status = sndSalesOrders.challanstatus and statustables = 'sndDeliveryChallan') as challanstatusName
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 1 and  Status =3 and challanstatus =0
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
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

function get_specimenordersChallan($conn) {


    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
      ,convert(char(11),OrderDate,120) as OrderDate, SpecimenUserID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
   ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SpecimenUserName
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,challanstatus
       ,(select Statusmeans from sndStatus where status = sndSalesOrders.challanstatus and statustables = 'sndDeliveryChallan') as challanstatusName
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus
  FROM [dbo].[sndSalesOrders] 
  where OrderTypeID = 2 and  Status =3 and challanstatus =0
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
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

function get_salesordersInvoice($conn) {


    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY sndSalesOrders.SalesOrderID) AS SL, 
        sndSalesOrders.SalesOrderID
      ,SalesOrderNo
       ,OrderDate
      ,sndDeliveryChallanMaster.ChallanID
	  ,sndDeliveryChallanMaster.ChallanNo
	  ,sndDeliveryChallanMaster.ChallanDate
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,sndSalesOrders.status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,challanstatus
       ,(select Statusmeans from sndStatus where status = sndSalesOrders.challanstatus and statustables = 'sndDeliveryChallan') as challanstatusName
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus
  FROM [dbo].[sndSalesOrders],sndDeliveryChallanMaster 
  where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID and
  OrderTypeID = 1 and  sndSalesOrders.Status =3 and sndSalesOrders.InvoiceStatus =0 
  order by sndSalesOrders.SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
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


function get_specimenordersInvoice($conn) {


    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY sndSalesOrders.SalesOrderID) AS SL, 
        sndSalesOrders.SalesOrderID
      ,SalesOrderNo
	  ,sndDeliveryChallanMaster.ChallanNo
	  ,sndDeliveryChallanMaster.ChallanDate
      ,convert(char(11),OrderDate,120) as OrderDate
      ,(select dcm.ChallanID from sndDeliveryChallanMaster dcm where dcm.SalesOrderID = sndSalesOrders.SalesOrderID) as ChallanID
      ,SpecimenUserID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
	  ,(select EmpName from sndUsers where sndUsers.userid = sndSalesOrders.SpecimenUserID) as SpecimenUserName
	  ,sndSalesOrders.status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,challanstatus
       ,(select Statusmeans from sndStatus where status = sndSalesOrders.InvoiceStatus and statustables = 'sndInvoiceMaster') as challanstatusName
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus
  FROM sndSalesOrders, sndDeliveryChallanMaster
  where sndSalesOrders.SalesOrderID = sndDeliveryChallanMaster.SalesOrderID and
  OrderTypeID = 2 and  sndSalesOrders.Status =3 and sndSalesOrders.InvoiceStatus =0 and ChallanStatus =1
  order by sndSalesOrders.SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
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



// Function to get all sales orders with approval status
function get_salesordersSpecemenApproval($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
       SELECT 
        ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
       SalesOrderID
      ,SalesOrderNo
       ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SoInfo3
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID, SpecimenUserID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
	  	  ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SpecimenUserName
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Authorized By')
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Approved By') 
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].[sndSalesOrders] 
 WHERE OrderTypeID = 2
        AND (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndSalesOrders' AND AppStatus = sndSalesOrders.Status) 
            AND Status = 1 
        ) 
            And (select count(*) from sndSalesOrderDetails sod where sod.SalesOrderID = sndSalesOrders.SalesOrderID)>0
         OR OrderTypeID = 2 and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndSalesOrders' AND AppStatus = sndSalesOrders.Status) 
            AND Status = 2 
        )
            And (select count(*) from sndSalesOrderDetails sod where sod.SalesOrderID = sndSalesOrders.SalesOrderID)>0
    ORDER BY SalesOrderID DESC";


    $sql1 = "
       SELECT 
        ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
       SalesOrderID
      ,SalesOrderNo
       ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SoInfo3
      ,convert(char(11),OrderDate,120) as OrderDate, PartyID, SpecimenUserID
	  ,(select RegionID from sndPartyMaster where sndPartyMaster.PartyID = sndSalesOrders.PartyID) as RegionID
	  	  ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SpecimenUserName
      ,(select partyname from sndPartyMaster where PartyID = sndSalesOrders.PartyID) as partyname
	  ,status
      ,(select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders') as Status
      ,(select Distinct AppStatusmeans from sndApprovals where AppStatus = sndSalesOrders.AppStatus and Approvaltables = 'sndSalesOrders') as AppStatus
      ,TotalAmount
      ,(select EmpName from sndUsers where userid = sndSalesOrders.UserID) as logUserName, AppStatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Authorized By')
then 'Authrized' else 'Not Authorized' end as UserAuthorizedSatus,
 case when AppStatus = (select appstatus from sndApprovals where RoleID in (select Roleid from sndUserRoleMapping where userid = ?) and ApprovalTables = 'sndSalesOrders'
and AppStatusMeans = 'Approved By') 
then 'Authrized' else 'Not Authorized' end as UserApprovalSatus
  FROM [dbo].[sndSalesOrders] 
 WHERE 
      OrderTypeID = 2 and  Status =1 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 2 and  Status =2 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
    ORDER BY SalesOrderID DESC";


    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID];

    // Prepare and execute the query
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
  where 
        OrderTypeID = 2 and  Status =3 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 2 and  Status =3 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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

function get_salesordersSpecemanComplete($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
      ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SoInfo3
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
 where 
 OrderTypeID = 2 and  Status =3 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 2 and  Status =3 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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


// For Reject 

function get_salesordersSpecemanReject($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
        ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
      ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SoInfo3
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
  where 
  
   OrderTypeID = 2 and  Status =4 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 2 and  Status =4 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))

  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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

// For Reject 

function get_salesordersSpecemanCancelled($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }		

    // SQL query with proper parameter placeholders
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY SalesOrderID) AS SL, 
        SalesOrderID
      ,SalesOrderNo
      ,SalesOrderNo as SoInfo1
      ,CONCAT(convert(char(10),OrderDate,105),' - ', TotalAmount) as SoInfo2
      ,(select EmpName from sndUsers where userid = sndSalesOrders.SpecimenUserID) as SoInfo3
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
  where
     OrderTypeID = 2 and  Status =5 and userid in (select userid from sndUserView where ReportingToUserID = ?)
  or OrderTypeID = 2 and  Status =5 and userid in (select userid from sndUserView where ReportingToUserID in (select userid from sndUserView where ReportingToUserID = ?))
  order by SalesOrderID desc";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];

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

function update_salesorderdetails($conn, $SalesOrderDetailID) {
    // Validate SalesOrderDetailID
    if (empty($SalesOrderDetailID)) {
        echo json_encode(["error" => "SalesOrderDetailID is required"]);
        return;
    }

    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate Quantity input
    if (!isset($input['Quantity']) || !is_numeric($input['Quantity'])) {
        echo json_encode(["error" => "Valid Quantity is required"]);
        return;
    }

    // Fetch the existing quantity
    $sql = "SELECT Quantity FROM sndSalesOrderDetails WHERE SalesOrderDetailID = ?";
    $params = [$SalesOrderDetailID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Stock-In: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $OQuantity = $row ? (float)$row['Quantity'] : 0.00; // Default to 0 if no data

    // Prepare SQL query to update the sales order
    $sql = "UPDATE sndSalesOrderDetails
            SET Quantity = ?, 
                OrderedQty = ?, 
                ModifiedAt = GETDATE()
            WHERE SalesOrderDetailID = ?";

    // Prepare parameters for the query
    $params = [
        $input['Quantity'],
        $OQuantity,
        $SalesOrderDetailID
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle SQL execution errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error updating sales order: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Return success response
    echo json_encode(["success" => "Sales order updated successfully", "SalesOrderDetailID" => $SalesOrderDetailID]);
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
            WHERE SalesOrderID = ? and status =1";

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
    if (empty($input['OrderDate'])) {
        echo json_encode(["error" => "OrderDate is required"]);
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

    // Delete existing details for the given SalesOrderID
    $deleteSql = "DELETE FROM sndSalesOrderDetails WHERE SalesOrderID = ?";
    $deleteParams = [$SalesOrderID];
    $deleteStmt = sqlsrv_query($conn, $deleteSql, $deleteParams);

    if ($deleteStmt === false) {
        echo json_encode(["error" => "Error deleting existing sales order details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Insert new order details
    if (isset($input['orderDetails']) && is_array($input['orderDetails'])) {
        foreach ($input['orderDetails'] as $detail) {
            // Validate required fields for order details
            if (
                empty($detail['FinancialYearID']) || 
                empty($detail['ProductCategoryID']) || 
                empty($detail['ProductID']) || 
                empty($detail['Quantity']) || 
                empty($detail['Price'])
            ) {
                echo json_encode(["error" => "Missing required fields in order details"]);
                return;
            }

            $insertSql = "INSERT INTO sndSalesOrderDetails
                          (SalesOrderID, FinancialYearID, ProductCategoryID, ProductID, Quantity, Price, Total)
                          VALUES (?, ?, ?, ?, ?, ?, ?)";

            $paramsDetail = [
                $SalesOrderID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Price'],
                $detail['Quantity'] * $detail['Price'] // Calculate Total
            ];

            $insertStmt = sqlsrv_query($conn, $insertSql, $paramsDetail);

            // Handle SQL execution errors for inserting details
            if ($insertStmt === false) {
                echo json_encode(["error" => "Error inserting sales order detail: " . print_r(sqlsrv_errors(), true)]);
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

function get_specimenorders_users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) {    
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY SalesOrderNo) AS SL, 
    SalesOrderNo as SoInfo1 
    ,convert(char(11),OrderDate,120) as SoInfo2 
    ,CONCAT(FORMAT(ISNULL(TotalAmount, 0), 'N2'), ' - ', (select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders')) as SoInfo3
    ,SalesOrderID,
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
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    (SELECT EmpName 
     FROM sndUsers 
     WHERE UserID = sndSalesOrders.UserID) AS LogUserName,
     0 as Locations,
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
ORDER BY 
    SalesOrderID DESC";
    $stmt = sqlsrv_query($conn, $sql);

} else {

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY SalesOrderNo) AS SL, 
   SalesOrderNo as SoInfo1 
   ,convert(char(11),OrderDate,120) as SoInfo2 
   ,CONCAT(FORMAT(ISNULL(TotalAmount, 0), 'N2'), ' - ', (select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders')) as SoInfo3
   ,SalesOrderID,
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
   FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
   (SELECT EmpName 
    FROM sndUsers 
    WHERE UserID = sndSalesOrders.UserID) AS LogUserName,
    0 as Locations,
   CASE 
       WHEN (SELECT COUNT(*) 
             FROM sndSalesOrderDetails 
             WHERE sndSalesOrderDetails.SalesOrderID = sndSalesOrders.SalesOrderID) = 0 THEN 'False' 
       ELSE 'True' 
   END AS DetailsStatus
FROM 
   [dbo].[sndSalesOrders]
WHERE 
   OrderTypeID = 2 and UserID = ?
   or OrderTypeID = 2 and UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)
   or OrderTypeID = 2 and UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))
   or OrderTypeID = 2 and UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)))
   or OrderTypeID = 2 and UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))))
ORDER BY 
   SalesOrderID DESC";
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

}    
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


// Function to get all sales orders
function get_specimenorders($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY SalesOrderNo) AS SL, 
    SalesOrderNo as SoInfo1 
    ,convert(char(11),OrderDate,120) as SoInfo2 
    ,CONCAT(FORMAT(ISNULL(TotalAmount, 0), 'N2'), ' - ', (select Statusmeans from sndStatus where status = sndSalesOrders.status and statustables = 'sndSalesOrders')) as SoInfo3
    ,SalesOrderID,
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
    FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
    (SELECT EmpName 
     FROM sndUsers 
     WHERE UserID = sndSalesOrders.UserID) AS LogUserName,
     0 as Locations,
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
    header('Content-Type: application/json');

    // Validate SalesOrderDetailID
    if (empty($SalesOrderDetailID)) {
        echo json_encode(["error" => "SalesOrderDetailID is required"]);
        return;
    }

    // Step 1: Get SalesOrderID for the detail being deleted
    $getOrderIdSql = "SELECT SalesOrderID FROM sndSalesOrderDetails WHERE SalesOrderDetailID = ?";
    $stmtOrder = sqlsrv_query($conn, $getOrderIdSql, [$SalesOrderDetailID]);

    if ($stmtOrder === false || !($orderRow = sqlsrv_fetch_array($stmtOrder, SQLSRV_FETCH_ASSOC))) {
        echo json_encode(["error" => "Sales order detail not found or error occurred", "details" => sqlsrv_errors()]);
        return;
    }

    $SalesOrderID = $orderRow['SalesOrderID'];

    // Step 2: Check if the Sales Order is active (status = 1)
    $checkStatusSql = "SELECT SalesOrderID FROM sndSalesOrders WHERE SalesOrderID = ? AND Status = 1";
    $stmtStatus = sqlsrv_query($conn, $checkStatusSql, [$SalesOrderID]);

    if ($stmtStatus === false || !sqlsrv_fetch_array($stmtStatus, SQLSRV_FETCH_ASSOC)) {
        echo json_encode(["error" => "Sales order is not active or doesn't exist", "details" => sqlsrv_errors()]);
        return;
    }

    // Step 3: Delete the SalesOrderDetail
    $deleteSql = "DELETE FROM sndSalesOrderDetails WHERE SalesOrderDetailID = ?";
    $stmtDelete = sqlsrv_query($conn, $deleteSql, [$SalesOrderDetailID]);

    if ($stmtDelete === false) {
        echo json_encode(["error" => "Error deleting order detail", "details" => sqlsrv_errors()]);
        return;
    }

    if (sqlsrv_rows_affected($stmtDelete) === 0) {
        echo json_encode(["error" => "No record deleted. Possibly already deleted."]);
        return;
    }

    // Step 4: Update TotalAmount in sndSalesOrders
    $updateTotalSql = "
        UPDATE sndSalesOrders
        SET TotalAmount = ISNULL((
            SELECT SUM(ISNULL(Quantity, 0) * ISNULL(Price, 0))
            FROM sndSalesOrderDetails
            WHERE SalesOrderID = ?
        ), 0)
        WHERE SalesOrderID = ?
    ";
    $stmtUpdate = sqlsrv_query($conn, $updateTotalSql, [$SalesOrderID, $SalesOrderID]);

    if ($stmtUpdate === false) {
        echo json_encode(["error" => "Error updating total amount", "details" => sqlsrv_errors()]);
        return;
    }

    // Final response
    echo json_encode([
        "message" => "Order detail deleted and total amount updated successfully",
        "SalesOrderDetailID" => $SalesOrderDetailID,
        "SalesOrderID" => $SalesOrderID
    ]);
}

function delete_BDExpReqDetails($conn, $BDExpReqDetailsID) {
    header('Content-Type: application/json');

    // Validate BDExpReqDetailsID
    if (empty($BDExpReqDetailsID)) {
        echo json_encode(["error" => "BDExpReqDetailsID is required"]);
        return;
    }

    // Step 1: Get BDExpReqID for the detail being deleted
    $getReqIdSql = "SELECT BDExpReqID FROM sndBDExpReqDetails WHERE BDExpReqDetailsID = ?";
    $stmtReq = sqlsrv_query($conn, $getReqIdSql, [$BDExpReqDetailsID]);

    if ($stmtReq === false || !($reqRow = sqlsrv_fetch_array($stmtReq, SQLSRV_FETCH_ASSOC))) {
        echo json_encode(["error" => "BDExpReqDetails not found", "details" => sqlsrv_errors()]);
        return;
    }

    $BDExpReqID = $reqRow['BDExpReqID'];

    // Step 2: Check if the parent request is active (status = 1)
    $checkStatusSql = "SELECT BDExpReqID FROM sndBDExpReq WHERE BDExpReqID = ? AND Status = 1";
    $stmtStatus = sqlsrv_query($conn, $checkStatusSql, [$BDExpReqID]);

    if ($stmtStatus === false || !sqlsrv_fetch_array($stmtStatus, SQLSRV_FETCH_ASSOC)) {
        echo json_encode(["error" => "BDExpReq is not active or doesn't exist", "details" => sqlsrv_errors()]);
        return;
    }

    // Step 3: Delete the record from sndBDExpReqDetails
    $deleteSql = "DELETE FROM sndBDExpReqDetails WHERE BDExpReqDetailsID = ?";
    $stmtDelete = sqlsrv_query($conn, $deleteSql, [$BDExpReqDetailsID]);

    if ($stmtDelete === false) {
        echo json_encode(["error" => "Error deleting record", "details" => sqlsrv_errors()]);
        return;
    }

    if (sqlsrv_rows_affected($stmtDelete) === 0) {
        echo json_encode(["error" => "No record deleted. Possibly already deleted."]);
        return;
    }

    // Step 4: Recalculate TotalAmount in sndBDExpReq from remaining details
    $updateTotalSql = "
        UPDATE sndBDExpReq
        SET TotalAmount = ISNULL((
            SELECT SUM(ISNULL(DonationAmount, 0))
            FROM sndBDExpReqDetails
            WHERE BDExpReqID = ?
        ), 0)
        WHERE BDExpReqID = ?
    ";
    $stmtUpdate = sqlsrv_query($conn, $updateTotalSql, [$BDExpReqID, $BDExpReqID]);

    if ($stmtUpdate === false) {
        echo json_encode(["error" => "Error updating total amount", "details" => sqlsrv_errors()]);
        return;
    }

    // Success response
    echo json_encode([
        "message" => "BDExpReq detail deleted and total amount updated successfully",
        "BDExpReqDetailsID" => $BDExpReqDetailsID,
        "BDExpReqID" => $BDExpReqID
    ]);
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
sqlsrv_next_result($stmtOrder); // Move to the next result set
$row = sqlsrv_fetch_array($stmtOrder, SQLSRV_FETCH_ASSOC);
$SalesOrderID = $row['SalesOrderID'] ?? null;

  
	 $SalesOrderNo = $data['SalesOrderNo'] ?? null;
    $TotalAmount = $data['TotalAmount'] ?? null;
    $UserID = $data['UserID'] ?? null;
    $PartyID = $data['PartyID'] ?? null;
	
	
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


 // ✅ Fix: Use Parameterized Query for Notifications
    $sqlNotification = "INSERT INTO sndNotificationsGenerate (
        NotificationTables, 
        DataID, 
        NotificationTitle, 
        sndNotificationsID, 
        NotificationStatus, 
        NotificationPage,
        Notifiedby, 
        CreatedAt,
        PartyID
    ) VALUES ('sndSalesOrders', ?, 'Sales Order Approval', 2, 0, 'Sales order approval process', ?, GETDATE(), ?)";

    $paramsNotification = [$SalesOrderID, $UserID, $PartyID];

    $stmtOrderNotification = sqlsrv_query($conn, $sqlNotification, $paramsNotification);

    if ($stmtOrderNotification === false) {
        echo json_encode(["error" => "Error creating notification: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["success" => "Order created successfully", "SalesOrderID" => $SalesOrderID]);
}

function create_order_123($conn) {
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


function create_order_master2($conn) {
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

    // Updated SQL Query to use OUTPUT INTO
    $sqlOrder = "
    DECLARE @InsertedSalesOrders TABLE (SalesOrderID INT);

    INSERT INTO sndSalesOrders (
        SalesOrderNo, OrderDate, OrderTypeID, PartyID, SpecimenUserID,
        TotalAmount, UserID, CreatedAt, ModifiedAt
    ) 
    OUTPUT INSERTED.SalesOrderID INTO @InsertedSalesOrders
    VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE());

    SELECT SalesOrderID FROM @InsertedSalesOrders;
    ";

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

        // Validate mandatory fields
        if (empty($input['SalesOrderID']) || !isset($input['UserID'])) {
            echo json_encode(["error" => "Missing required fields"]);
            return;
        }

        // Assign variables from the input
        $SalesOrderID = $input['SalesOrderID'];
        $DemandInfo = $input['DemandInfo'] ?? null;
        $ReturnInfo = $input['ReturnInfo'] ?? null;
        $AuthComments = $input['AuthComments'] ?? null;
        $AppComments = $input['AppComments'] ?? null;
        $UserID = $input['UserID'];

        // Step 1: Fetch OrderTypeID
        $sqlGetAppStatus1 = "SELECT OrderTypeID FROM sndSalesOrders WHERE SalesOrderID = ?";
        $stmtGetAppStatus1 = sqlsrv_query($conn, $sqlGetAppStatus1, [$SalesOrderID]);

        if ($stmtGetAppStatus1 === false || !($rowGetAppStatus1 = sqlsrv_fetch_array($stmtGetAppStatus1, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "SalesOrder not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        // Step 2: Fetch Current AppStatus
        $sqlGetAppStatus = "SELECT AppStatus FROM sndSalesOrders WHERE SalesOrderID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$SalesOrderID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "SalesOrder not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        // Determine new status based on current AppStatus
        if ($currentAppStatus == 1) {
            $newAppStatus = 2;
            $newStatus = 2;
        } elseif ($currentAppStatus == 2) {
            $newAppStatus = 3;
            $newStatus = 3;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for SalesOrderID $SalesOrderID"]);
            return;
        }

        // Prepare Approval Data
        $approvalData = [
            'ApprovalType' => 'sndSalesOrders',
            'ApprovalTypeID' => $SalesOrderID,
            'DemandInfo' => ($rowGetAppStatus1['OrderTypeID'] == 1) ? $DemandInfo : null, // Only if OrderTypeID = 1
            'ReturnInfo' => ($rowGetAppStatus1['OrderTypeID'] == 1) ? $ReturnInfo : null, // Only if OrderTypeID = 1
            'AuthComments' => $AuthComments,
            'AppComments' => $AppComments,
            'CanclledComments' => '',
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

        // Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, DemandInfo, 
                ReturnInfo, AuthComments, AppComments, CanclledComments, 
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
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
            echo json_encode(["error" => "Error creating approval details.", "details" => sqlsrv_errors()]);
            return;
        }

        // Update sndSalesOrders
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

function create_sndApprovalRejected_CancelledBDExpReq($conn) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['BDExpReqID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$BDExpReqID = $input['BDExpReqID'];
$CanclledComments = $input['CanclledComments'] ?? null; // Allow null for AuthComments
$RejectComments = $input['RejectComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndBDExpReq WHERE BDExpReqID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$BDExpReqID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "BDExpReq not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndBDExpReq',
            'ApprovalTypeID' => $BDExpReqID,
            'RejectComments' => $RejectComments,
            'CanclledComments' => $CanclledComments, // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

         // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {        
            $approvalData['AppStatus'] = 1;
            $approvalData['CanclledComments'] = $CanclledComments;
            $newAppStatus = 6;    //Cancelled
            $nAppStatus = 6; 
            $newStatus = 6;
        } elseif ($currentAppStatus == 2) {
            $approvalData['AppStatus'] = 2;
            $approvalData['RejectComments'] = $RejectComments;
            $newAppStatus = 5;      // Rejected
            $nAppStatus = 5;      // Rejected
            $newStatus = 5;
        } elseif ($currentAppStatus == 3) {
            $approvalData['AppStatus'] = 3;
            $approvalData['RejectComments'] = $RejectComments;
            $newAppStatus = 5;      // Rejected
            $nAppStatus = 5;      // Rejected
            $newStatus = 5;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for BDExpReqID: $BDExpReqID"]);
            return;
        }
        
        

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate,  RejectComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
            $approvalData['RejectComments'],
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
        $sqlUpdateSalesOrder = "UPDATE sndBDExpReq SET Status = ?, AppStatus = ? WHERE BDExpReqID = ?";
        $paramsUpdate = [$newStatus, $nAppStatus, $BDExpReqID];

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

function create_sndApprovalRejected_CancelledMR($conn, $MRID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['MRID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$MRID = $input['MRID'];
$CanclledComments = $input['CanclledComments'] ?? null; // Allow null for AuthComments
$RejectComments = $input['RejectComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndMoneyReceipt WHERE MRID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$MRID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "MRID not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndMoneyReceipt',
            'ApprovalTypeID' => $MRID,
            'RejectComments' => $RejectComments,
            'CanclledComments' => $CanclledComments, // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

         // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {        
            $approvalData['AppStatus'] = 1;
            $approvalData['CanclledComments'] = $CanclledComments;
            $newAppStatus = 6;    //Cancelled
            $nAppStatus = 6; 
            $newStatus = 6;
        } elseif ($currentAppStatus == 2) {
            $approvalData['AppStatus'] = 2;
            $approvalData['RejectComments'] = $RejectComments;
            $nAppStatus = 5;      // Rejected
            $newAppStatus = 5;      // Rejected
            $newStatus = 5;
        } elseif ($currentAppStatus == 3) {
            $approvalData['AppStatus'] = 3;
            $approvalData['RejectComments'] = $RejectComments;
            $nAppStatus = 5;      // Rejected
            $newAppStatus = 5;      // Rejected
            $newStatus = 5;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for MRID: $MRID"]);
            return;
        }
        

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate,  RejectComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
            $approvalData['RejectComments'],
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
        $sqlUpdateSalesOrder = "UPDATE sndMoneyReceipt SET Status = ?, AppStatus = ? WHERE MRID = ?";
        $paramsUpdate = [$newStatus, $nAppStatus, $MRID];

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


function create_sndApprovalRejected_CancelledVisitEntry($conn, $VisitPlanID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['VisitPlanID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$VisitPlanID = $input['VisitPlanID'];
$CanclledComments = $input['CanclledComments'] ?? null; // Allow null for AuthComments
$RejectComments = $input['RejectComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT EAppStatus FROM sndVisitPlans WHERE VisitPlanID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$VisitPlanID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "VisitPlanID not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['EAppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndVisitPlansEntry',
            'ApprovalTypeID' => $VisitPlanID,
            'RejectComments' => $RejectComments,
            'CanclledComments' => $CanclledComments, // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

         // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {        
            $approvalData['EAppStatus'] = 1;
            $approvalData['CanclledComments'] = $CanclledComments;
            $newAppStatus = 6;    //Cancelled
            $nAppStatus = 6; 
            $newStatus = 6;
        } elseif ($currentAppStatus == 2) {
            $approvalData['EAppStatus'] = 2;
            $approvalData['RejectComments'] = $RejectComments;
            $nAppStatus = 5;      // Rejected
            $newAppStatus = 5;      // Rejected
            $newStatus = 5;
        } elseif ($currentAppStatus == 3) {
            $approvalData['EAppStatus'] = 3;
            $approvalData['RejectComments'] = $RejectComments;
            $nAppStatus = 5;      // Rejected
            $newAppStatus = 5;      // Rejected
            $newStatus = 5;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for VisitPlanID: $VisitPlanID"]);
            return;
        }
        

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate,  RejectComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
            $approvalData['RejectComments'],
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
        $sqlUpdateSalesOrder = "UPDATE sndVisitPlans SET EStatus = ?, EAppStatus = ? WHERE VisitPlanID = ?";
        $paramsUpdate = [$newStatus, $nAppStatus, $VisitPlanID];

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
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$SalesOrderID = $input['SalesOrderID'];
$CanclledComments = $input['CanclledComments'] ?? null; // Allow null for AuthComments
$RejectComments = $input['RejectComments'] ?? null; // Allow null for AppComments
$UserID = $input['UserID'];


        // Step 2: Get the current AppStatus of the SalesOrder
        $sqlGetAppStatus = "SELECT AppStatus FROM sndSalesOrders WHERE SalesOrderID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$SalesOrderID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "SalesOrderID not found or query failed.", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        $approvalData = [
            'ApprovalType' => 'sndSalesOrders',
            'ApprovalTypeID' => $SalesOrderID,
            'RejectComments' => $RejectComments,
            'CanclledComments' => $CanclledComments, // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

         // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {        
            $approvalData['AppStatus'] = 1;
            $approvalData['CanclledComments'] = $CanclledComments;
            $newAppStatus = 5;    //Cancelled
            $nAppStatus = 5; 
            $newStatus = 5;
        } elseif ($currentAppStatus == 2) {
            $approvalData['AppStatus'] = 2;
            $approvalData['RejectComments'] = $RejectComments;
            $nAppStatus = 4;      // Rejected
            $newAppStatus = 4;      // Rejected
            $newStatus = 4;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for SalesOrderID: $SalesOrderID"]);
            return;
        }
        

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate,  RejectComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
            $approvalData['RejectComments'],
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
        $paramsUpdate = [$newStatus, $nAppStatus, $SalesOrderID];

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


function create_sndApprovalRejected_Cancelled11($conn) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

       if (
    empty($input['SalesOrderID']) ||         // SalesOrderID is mandatory
    !isset($input['UserID'])                 // UserID must exist (can be 0)
) {
    echo json_encode(["error" => "Missing required fields"]);
    return;
}

// Assign variables from the input
$SalesOrderID = $input['SalesOrderID'];
$CanclledComments = $input['CanclledComments'] ?? null; // Allow null for AuthComments
$RejectComments = $input['RejectComments'] ?? null; // Allow null for AppComments
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
            'CanclledComments' => $CanclledComments,
            'RejectComments' => $RejectComments,
         //   'RejectComments' => $RejectComments,
          //  'CanclledComments' => $CanclledComments, // Default to empty string
            'ApprovalDetailsByID' => $UserID,
            'UserID' => $UserID,
            'ApprovalDate' => date('Y-m-d H:i:s'),
            'CreatedAt' => date('Y-m-d H:i:s'),
        ];

         // Step 3: Set appropriate fields based on AppStatus
        if ($currentAppStatus == 1) {        
            $approvalData['AppStatus'] = 1;
            $approvalData['AuthComments'] = '';
            $approvalData['CanclledComments'] = $CanclledComments;
            $newAppStatus = 5;    //Cancelled
            $nAppStatus = 5; 
            $newStatus = 5;
        } elseif ($currentAppStatus == 2) {
            $approvalData['AppStatus'] = 2;
            $approvalData['ReturnInfo'] = $ReturnInfo;
            $approvalData['RejectComments'] = $RejectComments;
            $newAppStatus = 4;      // Rejected
            $nAppStatus = 1; 
            $newStatus = 1;
        } else {
            echo json_encode(["error" => "Invalid AppStatus for SalesOrderID $SalesOrderID"]);
            return;
        }
        

        // Step 4: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, 
                 RjectComments, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $paramsOrder = [
            $approvalData['ApprovalType'],
            $approvalData['ApprovalTypeID'],
            $newAppStatus,
            $approvalData['ApprovalDate'],
            $approvalData['RjectComments'],
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
        $paramsUpdate = [$newStatus, $nAppStatus, $SalesOrderID];

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




function create_order_details1($conn) {
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

    $SalesOrderID = $input['SalesOrderID'];

    // Check if the order is already checked (status = 1)
    $sql1 = "SELECT Status FROM sndSalesOrders WHERE SalesOrderID = ?";
    $stmtCheckStatus = sqlsrv_query($conn, $sql1, [$SalesOrderID]);

    if ($stmtCheckStatus === false) {
        echo json_encode(["error" => "Error checking order status: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($stmtCheckStatus, SQLSRV_FETCH_ASSOC);
    if (!$row) {
        echo json_encode(["error" => "Order not found"]);
        return;
    }

    $status = $row['Status'];

    if ($status <> 1) {
        echo json_encode(["message" => "Order detail can't be inserted because it has already been checked"]);
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
                           SELECT SUM(Quantity * Price) 
                           FROM sndSalesOrderDetails
                           WHERE sndSalesOrderDetails.SalesOrderID = sndSalesOrders.SalesOrderID
                       )
                       WHERE SalesOrderID = ?";
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

function create_PTransferDetails($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        empty($input['ProductTransferID']) ||
        empty($input['FinancialYearID']) ||
        empty($input['ProductCategoryID']) ||
        empty($input['ProductID']) ||
        !isset($input['Quantity']) || // Allow 0 as valid
        !isset($input['Rate'])   ||    // Allow 0 as valid
        !isset($input['Total'])       // Allow 0 as valid
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Convert values to correct data types
    $ProductTransferID = (int) $input['ProductTransferID'];
    $FinancialYearID = (int) $input['FinancialYearID'];
    $ProductCategoryID = (int) $input['ProductCategoryID'];
    $ProductID = (int) $input['ProductID'];
    $Quantity = (int) $input['Quantity'];
    $Rate = (float) $input['Rate'];
    $Total = (float) $input['Total'];

    // Insert into Product Transfer Details
    $insertDetailSQL = "INSERT INTO sndProductTransferDetails (
                            ProductTransferID, FinancialYearID, ProductCategoryID,
                            ProductID, Quantity, Rate, Total
                        ) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $paramsDetail = [
        $ProductTransferID,
        $FinancialYearID,
        $ProductCategoryID,
        $ProductID,
        $Quantity,
        $Rate,
        $Total
    ];

    $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);

    if ($stmtDetail === false) {
        echo json_encode(["error" => "Error inserting Product Transfer detail: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Update TotalAmount & InWord in Product Transfer Master
    $updateSQL = "UPDATE sndProductTransfer 
                  SET TotalAmount = (SELECT SUM(Total) FROM sndProductTransferDetails WHERE ProductTransferID = ?),
                      InWord = [dbo].[fnNumberToWords]((SELECT SUM(Total) FROM sndProductTransferDetails WHERE ProductTransferID = ?))
                  WHERE ProductTransferID = ?";

    $paramsUpdate = [$ProductTransferID, $ProductTransferID, $ProductTransferID];
    $stmtUpdate = sqlsrv_query($conn, $updateSQL, $paramsUpdate);

    if ($stmtUpdate === false) {
        echo json_encode(["error" => "Error updating TotalAmount & InWord: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode([
        "message" => "Product Transfer details inserted successfully and TotalAmount updated",
        "ProductTransferID" => $ProductTransferID
    ]);
}

function create_preturndetails($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        empty($input['ProductReturnID']) ||
        empty($input['FinancialYearID']) ||
        empty($input['ProductCategoryID']) ||
        empty($input['ProductID']) ||
        !isset($input['Quantity']) || // Allow 0 as valid
        !isset($input['Rate'])   ||    // Allow 0 as valid
        !isset($input['Total'])       // Allow 0 as valid
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Convert values to correct data types
    $ProductReturnID = (int) $input['ProductReturnID'];
    $FinancialYearID = (int) $input['FinancialYearID'];
    $ProductCategoryID = (int) $input['ProductCategoryID'];
    $ProductID = (int) $input['ProductID'];
    $Quantity = (int) $input['Quantity'];
    $Rate = (float) $input['Rate'];
    $Total = (float) $input['Total'];

    // Insert into Product Return Details
    $insertDetailSQL = "INSERT INTO sndProductReturnDetails (
                            ProductReturnID, FinancialYearID, ProductCategoryID,
                            ProductID, Quantity, Rate, Total
                        ) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $paramsDetail = [
        $ProductReturnID,
        $FinancialYearID,
        $ProductCategoryID,
        $ProductID,
        $Quantity,
        $Rate,
        $Total
    ];

    $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);

    if ($stmtDetail === false) {
        echo json_encode(["error" => "Error inserting Product Return detail: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // **Update TotalAmount & InWord in sndProductReturn Using Your Query**
    $updateSQL = "UPDATE sndProductReturn 
                  SET TotalAmount = (SELECT SUM(Total) FROM sndProductReturnDetails WHERE ProductReturnID = ?),
                      InWord = [dbo].[fnNumberToWords]((SELECT SUM(Total) FROM sndProductReturnDetails WHERE ProductReturnID = ?))
                  WHERE ProductReturnID = ?";

    $paramsUpdate = [$ProductReturnID, $ProductReturnID, $ProductReturnID];
    $stmtUpdate = sqlsrv_query($conn, $updateSQL, $paramsUpdate);

    if ($stmtUpdate === false) {
        echo json_encode(["error" => "Error updating TotalAmount & InWord: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode([
        "message" => "Product Return details inserted successfully and TotalAmount updated",
        "ProductReturnID" => $ProductReturnID
    ]);
}

function create_PReturn($conn) {
    // Validate database connection
    if ($conn === false) {
        echo json_encode(["error" => "Database connection failed"]);
        return;
    }

    // Initialize return document path
    $returnDocPath = '';

    // Handle file upload (optional)
    if (isset($_FILES['ReturnDoc']) && $_FILES['ReturnDoc']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/return_docs/";
        $fileExtension = strtolower(pathinfo($_FILES['ReturnDoc']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx'];
        $fileMimeType = mime_content_type($_FILES['ReturnDoc']['tmp_name']);

        // Validate file type
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode(["error" => "Invalid file type. Allowed: JPG, PNG, GIF, PDF, DOCX"]);
            return;
        }

        // Ensure directory exists
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                echo json_encode(["error" => "Failed to create directory for upload"]);
                return;
            }
        }

        // Generate unique filename and save
        $fileName = uniqid("ReturnDoc_", true) . "." . $fileExtension;
        $targetFilePath = $targetDir . $fileName;

        if (!move_uploaded_file($_FILES['ReturnDoc']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Failed to save uploaded file"]);
            return;
        }

        $returnDocPath = '/uploads/return_docs/' . $fileName;
    }

    // Decode JSON fields (form-data text fields)
    $input = $_POST;

    // Validate required fields
    if (
        empty($input['ProductReturnNo']) ||
        empty($input['ReturnDate']) ||
        empty($input['PartyID']) ||
        !isset($input['UserID'])  // Allow "0"
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        $insertSQL = "INSERT INTO sndProductReturn (
                            ProductReturnNo, ReturnDate, PartyID,
                            UserID, ReturnDocPath, CreatedAt
                      ) 
                      OUTPUT INSERTED.ProductReturnID
                      VALUES (?, ?, ?, ?, ?, GETDATE())";

        $params = [
            $input['ProductReturnNo'],
            $input['ReturnDate'],
            $input['PartyID'],
            $input['UserID'],
            $returnDocPath
        ];

        $stmt = sqlsrv_query($conn, $insertSQL, $params);

        if ($stmt === false) {
            throw new Exception("Error inserting Product Return: " . print_r(sqlsrv_errors(), true));
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductReturnID'])) {
            throw new Exception("Failed to retrieve ProductReturnID.");
        }

        $ProductReturnID = $row['ProductReturnID'];

        sqlsrv_commit($conn);

        echo json_encode([
            "message" => "Product Return created successfully",
            "ProductReturnID" => $ProductReturnID,
            "ReturnDocPath" => $returnDocPath
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function create_PReturn1($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        empty($input['ProductReturnNo']) ||
        empty($input['ReturnDate']) ||
        empty($input['PartyID']) ||
        !isset($input['UserID'])  // Allow "0" as a valid value
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert into `sndProductReturn` and get inserted ID
        $insertSQL = "INSERT INTO sndProductReturn (
                            ProductReturnNo, ReturnDate, PartyID,
                            UserID, CreatedAt
                      ) 
                      OUTPUT INSERTED.ProductReturnID
                      VALUES (?, ?, ?, ?, GETDATE())";

        $params = [
            $input['ProductReturnNo'],
            $input['ReturnDate'],
            $input['PartyID'],
            $input['UserID']
        ];

        $stmt = sqlsrv_query($conn, $insertSQL, $params);

        if ($stmt === false) {
            throw new Exception("Error inserting Product Return: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the newly inserted ProductReturnID
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductReturnID'])) {
            throw new Exception("Failed to retrieve ProductReturnID.");
        }

        $ProductReturnID = $row['ProductReturnID'];

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Product Return created successfully",
            "ProductReturnID" => $ProductReturnID
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function create_PTransferMaster($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        empty($input['ProductTransferNo']) ||
        empty($input['TransferDate']) ||
        empty($input['PartyFromID']) ||
        empty($input['PartyToID']) ||
        !isset($input['UserID'])  // Allow "0" as a valid value
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert into `sndProductTransfer` and get inserted ID
        $insertSQL = "INSERT INTO sndProductTransfer (
                            ProductTransferNo, TransferDate, PartyFromID, PartyToID,
                            TotalAmount, InWord, UserID, CreatedAt
                      ) 
                      OUTPUT INSERTED.ProductTransferID
                      VALUES (?, ?, ?, ?, 0, '', ?, GETDATE())";

        $params = [
            $input['ProductTransferNo'],
            $input['TransferDate'],
            $input['PartyFromID'],
            $input['PartyToID'],
            $input['UserID']
        ];

        $stmt = sqlsrv_query($conn, $insertSQL, $params);

        if ($stmt === false) {
            throw new Exception("Error inserting Product Transfer: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the newly inserted ProductTransferID
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductTransferID'])) {
            throw new Exception("Failed to retrieve ProductTransferID.");
        }

        $ProductTransferID = $row['ProductTransferID'];

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Product Transfer created successfully",
            "ProductTransferID" => $ProductTransferID
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}



function create_PTransferall($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields for the main Product Transfer entry
    if (
        empty($input['ProductTransferNo']) ||
        empty($input['TransferDate']) ||
        empty($input['PartyFromID']) ||
		empty($input['PartyToID']) ||
        !isset($input['UserID'])  // Allow "0" as a valid value
    ) {
        echo json_encode(["error" => "Missing required fields in Product Transfer"]);
        Transfer;
    }

    // Start transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert Product Transfer (Header)
        $insertSQL = "INSERT INTO sndProductTransfer (
                            ProductTransferNo, TransferDate, PartyFromID, PartyToID,
                            TotalAmount, InWord, UserID, CreatedAt
                      ) 
                      OUTPUT INSERTED.ProductTransferID
                      VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE())";

        $params = [
            $input['ProductTransferNo'],
            $input['TransferDate'],
            $input['PartyFromID'],
			$input['PartyToID'],
            0, // Initial TotalAmount, will be updated later
            $input['InWord'],
            $input['UserID']
        ];

        $stmt = sqlsrv_query($conn, $insertSQL, $params);

        if ($stmt === false) {
            throw new Exception("Error inserting Product Transfer: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the newly inserted ProductTransferID
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductTransferID'])) {
            throw new Exception("Failed to retrieve ProductTransferID.");
        }

        $ProductTransferID = $row['ProductTransferID'];

        // Validate and insert Product Transfer Details
        if (!isset($input['Details']) || !is_array($input['Details']) || count($input['Details']) == 0) {
            throw new Exception("No product Transfer details provided.");
        }

        $totalAmount = 0;

        foreach ($input['Details'] as $detail) {
            if (
                empty($detail['FinancialYearID']) ||
                empty($detail['ProductCategoryID']) ||
                empty($detail['ProductID']) ||
                !isset($detail['Quantity']) || // Allow 0 as valid
                !isset($detail['Rate']) ||    // Allow 0 as valid
                !isset($detail['Total'])      // Allow 0 as valid
            ) {
                throw new Exception("Missing required fields in Product Transfer details.");
            }

            $insertDetailSQL = "INSERT INTO sndProductTransferDetails (
                                    ProductTransferID, FinancialYearID, ProductCategoryID,
                                    ProductID, Quantity, Rate, Total
                                ) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";

            $paramsDetail = [
                $ProductTransferID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Rate'],
                $detail['Total']
            ];

            $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);
            if ($stmtDetail === false) {
                throw new Exception("Error inserting Product Transfer detail: " . print_r(sqlsrv_errors(), true));
            }

            $totalAmount += $detail['Total'];
        }

        // Update total amount in Product Transfer
        $updateTotalSQL = "UPDATE sndProductTransfer SET TotalAmount = ? WHERE ProductTransferID = ?";
        $paramsUpdateTotal = [$totalAmount, $ProductTransferID];

        $stmtUpdateTotal = sqlsrv_query($conn, $updateTotalSQL, $paramsUpdateTotal);
        if ($stmtUpdateTotal === false) {
            throw new Exception("Error updating total amount: " . print_r(sqlsrv_errors(), true));
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Transfer success response
        echo json_encode([
            "message" => "Product Transfer and details created successfully",
            "ProductTransferID" => $ProductTransferID,
            "TotalAmount" => $totalAmount
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function create_PReturnall($conn) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields for the main Product Return entry
    if (
        empty($input['ProductReturnNo']) ||
        empty($input['ReturnDate']) ||
        empty($input['PartyID']) ||
        !isset($input['InWord']) || // Allow "0" as a valid value
        !isset($input['UserID'])  // Allow "0" as a valid value
    ) {
        echo json_encode(["error" => "Missing required fields in Product Return"]);
        return;
    }

    // Start transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert Product Return (Header)
        $insertSQL = "INSERT INTO sndProductReturn (
                            ProductReturnNo, ReturnDate, PartyID,
                            TotalAmount, InWord, UserID, CreatedAt
                      ) 
                      OUTPUT INSERTED.ProductReturnID
                      VALUES (?, ?, ?, ?, ?, ?, GETDATE())";

        $params = [
            $input['ProductReturnNo'],
            $input['ReturnDate'],
            $input['PartyID'],
            0, // Initial TotalAmount, will be updated later
            $input['InWord'],
            $input['UserID']
        ];

        $stmt = sqlsrv_query($conn, $insertSQL, $params);

        if ($stmt === false) {
            throw new Exception("Error inserting Product Return: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the newly inserted ProductReturnID
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductReturnID'])) {
            throw new Exception("Failed to retrieve ProductReturnID.");
        }

        $ProductReturnID = $row['ProductReturnID'];

        // Validate and insert Product Return Details
        if (!isset($input['Details']) || !is_array($input['Details']) || count($input['Details']) == 0) {
            throw new Exception("No product return details provided.");
        }

        $totalAmount = 0;

        foreach ($input['Details'] as $detail) {
            if (
                empty($detail['FinancialYearID']) ||
                empty($detail['ProductCategoryID']) ||
                empty($detail['ProductID']) ||
                !isset($detail['Quantity']) || // Allow 0 as valid
                !isset($detail['Rate']) ||    // Allow 0 as valid
                !isset($detail['Total'])      // Allow 0 as valid
            ) {
                throw new Exception("Missing required fields in Product Return details.");
            }

            $insertDetailSQL = "INSERT INTO sndProductReturnDetails (
                                    ProductReturnID, FinancialYearID, ProductCategoryID,
                                    ProductID, Quantity, Rate, Total
                                ) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";

            $paramsDetail = [
                $ProductReturnID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Rate'],
                $detail['Total']
            ];

            $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);
            if ($stmtDetail === false) {
                throw new Exception("Error inserting Product Return detail: " . print_r(sqlsrv_errors(), true));
            }

            $totalAmount += $detail['Total'];
        }

        // Update total amount in Product Return
        $updateTotalSQL = "UPDATE sndProductReturn SET TotalAmount = ? WHERE ProductReturnID = ?";
        $paramsUpdateTotal = [$totalAmount, $ProductReturnID];

        $stmtUpdateTotal = sqlsrv_query($conn, $updateTotalSQL, $paramsUpdateTotal);
        if ($stmtUpdateTotal === false) {
            throw new Exception("Error updating total amount: " . print_r(sqlsrv_errors(), true));
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Product Return and details created successfully",
            "ProductReturnID" => $ProductReturnID,
            "TotalAmount" => $totalAmount
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
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

function get_VisitEntryApprovalSum($conn, $UserID) {

    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY COUNT(CASE WHEN AppStatus = 1 THEN VisitPlanID END) DESC) AS SL,

    VisitUserID,
    (SELECT empname FROM sndusers WHERE sndusers.userID = VP.VisitUserID) AS VisitUserName,

    COUNT(CASE WHEN EStatus = 1 THEN VisitPlanID END) AS No_of_App_Pending,
    COUNT(CASE WHEN Status =4 and EStatus =3 THEN VisitPlanID END) AS No_of_Complete,
    COUNT(CASE WHEN EStatus = 5  THEN VisitPlanID END) AS No_of_Cancelled,
    -- The most recent (or highest priority) AppStatus for this user
    MAX(AppStatus) AS AnyStatus,

    (SELECT TOP 1 AppStatusmeans 
     FROM sndApprovals 
     WHERE AppStatus = MAX(VP.AppStatus) 
       AND Approvaltables = 'sndVisitPlans') AS Status
FROM sndVisitPlans VP
WHERE EStatus IN (1, 4, 5) and VEStatus IN (1,4,5) 
GROUP BY VisitUserID;";
   
   $params = [$UserID, $UserID];
 }elseif (in_array($UserID, [366,
496,
393,
405,
430,
633,
237,
241,
257,
299,
340,
342,
355])) {
    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY COUNT(CASE WHEN EAppStatus = 1 THEN VisitPlanID END) DESC) AS SL,

    VP.VisitUserID,
    (SELECT empname FROM sndusers WHERE sndusers.userID = VP.VisitUserID) AS VisitUserName,

    COUNT(CASE WHEN EStatus = 1 THEN VisitPlanID END) AS No_of_App_Pending,
    COUNT(CASE WHEN EStatus = 3 THEN VisitPlanID END) AS No_of_Complete,
    COUNT(CASE WHEN EStatus = 5 THEN VisitPlanID END) AS No_of_Cancelled,
    -- The most recent (or highest priority) AppStatus for this user
    MAX(AppStatus) AS AnyStatus,

    (SELECT TOP 1 AppStatusmeans 
     FROM sndApprovals 
     WHERE AppStatus = MAX(VP.EStatus) 
       AND Approvaltables = 'sndVisitPlansEntry') AS Status
FROM sndVisitPlans VP
WHERE  EStatus IN (1,3,5) and vp.VEStatus = 1 and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID =?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = VP.EStatus) 
           AND EStatus IN (1,3,5)  
            and (VP.UserID in (select userid from sndUsers where ReportingToUserID = ?)) 
            group by VP.VisitUserID;
";

$params = [$UserID,$UserID];

 }elseif (in_array($UserID, [298,
344,
345,
354,
472,
258,
716])) {
    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY COUNT(CASE WHEN EAppStatus = 1 THEN VisitPlanID END) DESC) AS SL,

    VP.VisitUserID,
    (SELECT empname FROM sndusers WHERE sndusers.userID = VP.VisitUserID) AS VisitUserName,

    COUNT(CASE WHEN EStatus = 1 THEN VisitPlanID END) AS No_of_App_Pending,
    COUNT(CASE WHEN EStatus = 3 THEN VisitPlanID END) AS No_of_Complete,
    COUNT(CASE WHEN EStatus = 5 THEN VisitPlanID END) AS No_of_Cancelled,
    -- The most recent (or highest priority) AppStatus for this user
    MAX(AppStatus) AS AnyStatus,

    (SELECT TOP 1 AppStatusmeans 
     FROM sndApprovals 
     WHERE AppStatus = MAX(VP.EStatus) 
       AND Approvaltables = 'sndVisitPlansEntry') AS Status
FROM sndVisitPlans VP
WHERE  EStatus IN (1,3,5) and vp.VEStatus = 1 and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID =?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = VP.EStatus) 
           AND EStatus IN (1,3,5)  
            and (VP.UserID in (select userid from sndUsers where ReportingToUserID = ?))  
or 
EStatus IN (1,3,5) and vp.VEStatus = 1 and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID =?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = VP.EStatus) 
           AND EStatus IN (1,3,5)  
            and (VP.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)))  
GROUP BY VisitUserID;
";

$params = [$UserID,$UserID,$UserID,$UserID];

}elseif (in_array($UserID, [705])) {
    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY COUNT(CASE WHEN AppStatus = 1 THEN VisitPlanID END) DESC) AS SL,

    VisitUserID,
    (SELECT empname FROM sndusers WHERE sndusers.userID = VP.VisitUserID) AS VisitUserName,

    COUNT(CASE WHEN EStatus = 3 THEN VisitPlanID END) AS No_of_App_Pending,
    COUNT(CASE WHEN EStatus = 4 THEN VisitPlanID END) AS No_of_Complete,
    COUNT(CASE WHEN EStatus = 5 THEN VisitPlanID END) AS No_of_Cancelled,
    -- The most recent (or highest priority) AppStatus for this user
    MAX(AppStatus) AS AnyStatus,

    (SELECT TOP 1 AppStatusmeans 
     FROM sndApprovals 
     WHERE AppStatus = MAX(VP.AppStatus) 
       AND Approvaltables = 'sndVisitPlans') AS Status
FROM sndVisitPlans VP
WHERE  EStatus IN (3) and vp.VEStatus = 1 and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = VP.EStatus) 
           AND EStatus = 3 
           and (VP.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))))  
GROUP BY VisitUserID;
";

$params = [$UserID,$UserID];
  }

   
$stmt = sqlsrv_query($conn, $sql, $params);

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


// Function to get all visit plans
function get_VisitPlanApprovalSum($conn, $UserID) {

    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY COUNT(CASE WHEN AppStatus = 1 THEN VisitPlanID END) DESC) AS SL,

    VisitUserID,
    (SELECT empname FROM sndusers WHERE sndusers.userID = VP.VisitUserID) AS VisitUserName,

    COUNT(CASE WHEN AppStatus = 1 THEN VisitPlanID END) AS No_of_App_Pending,
    COUNT(CASE WHEN AppStatus = 2 THEN VisitPlanID END) AS No_of_Complete,
    COUNT(CASE WHEN AppStatus = 3 THEN VisitPlanID END) AS No_of_Cancelled,
    -- The most recent (or highest priority) AppStatus for this user
    MAX(AppStatus) AS AnyStatus,

    (SELECT TOP 1 AppStatusmeans 
     FROM sndApprovals 
     WHERE AppStatus = MAX(VP.AppStatus) 
       AND Approvaltables = 'sndVisitPlans') AS Status
FROM sndVisitPlans VP
WHERE AppStatus IN (1, 2, 3)
GROUP BY VisitUserID;";
   
   $params = [$UserID, $UserID];
 }else {
    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY COUNT(VisitPlanID)) AS SL, 
    
    COUNT(VisitPlanID) AS No_of_App_Pending,

    -- Additional conditional counts
    (SELECT COUNT(*) FROM sndVisitPlans vp2 
     WHERE vp2.AppStatus = 2 AND vp2.VisitUserID = vp.VisitUserID) AS No_of_Complete,

    (SELECT COUNT(*) FROM sndVisitPlans vp3 
     WHERE vp3.AppStatus = 3 AND vp3.VisitUserID = vp.VisitUserID) AS No_of_Cancelled,

    VisitUserID,
    (SELECT empname FROM sndusers WHERE sndusers.userID = vp.VisitUserID) AS VisitUserName,

    AppStatus,

    (SELECT TOP 1 AppStatusmeans 
     FROM sndApprovals 
     WHERE AppStatus = vp.AppStatus 
       AND Approvaltables = 'sndVisitPlans') AS Status

FROM sndVisitPlans vp
WHERE vp.AppStatus IN (1)
  AND (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
      IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND AppStatus = vp.AppStatus)
  AND vp.UserID IN (SELECT userid FROM sndUsers WHERE ReportingToUserID = ?)
GROUP BY AppStatus, VisitUserID;
";

$params = [$UserID, $UserID];
  }

   
$stmt = sqlsrv_query($conn, $sql, $params);

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

function create_sndApprovalRejected_CancelledVisitPlan($conn) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

        // Validate required fields
        if (empty($input['VisitPlanID']) || !isset($input['UserID'])) {
            echo json_encode(["error" => "Missing required fields"]);
            return;
        }

        // Assign variables from the input
        $VisitPlanID = $input['VisitPlanID'];
        $CanclledComments = $input['CanclledComments'] ?? null;
        $UserID = $input['UserID'];

        // Step 1: Get the current AppStatus of the VisitPlan
        $sqlGetAppStatus = "SELECT AppStatus FROM sndVisitPlans WHERE VisitPlanID = ?";
        $stmtGetAppStatus = sqlsrv_query($conn, $sqlGetAppStatus, [$VisitPlanID]);

        if ($stmtGetAppStatus === false || !($row = sqlsrv_fetch_array($stmtGetAppStatus, SQLSRV_FETCH_ASSOC))) {
            echo json_encode(["error" => "VisitPlan not found or query failed", "details" => sqlsrv_errors()]);
            return;
        }

        $currentAppStatus = $row['AppStatus'];
        $newAppStatus = null;
        $newStatus = null;

        // Step 2: Determine the new AppStatus and Status
        if ($currentAppStatus == 1) { // Example condition for Cancelled
            $newAppStatus = 3; // Cancelled
            $newStatus = 3;    // Cancelled
        } else {
            echo json_encode(["error" => "Invalid AppStatus for VisitPlanID: $VisitPlanID"]);
            return;
        }

        // Step 3: Insert into sndApprovalDetails
        $sqlInsertApprovalDetails = "
            INSERT INTO sndApprovalDetails (
                ApprovalType, ApprovalTypeID, AppStatus, ApprovalDate, CanclledComments,
                ApprovalDetailsByID, UserID, CreatedAt
            ) VALUES (?, ?, ?, GETDATE(), ?, ?, ?, GETDATE())";

        $paramsOrder = [
            'sndVisitPlans',    // ApprovalType
            $VisitPlanID,       // ApprovalTypeID
            $newAppStatus,      // AppStatus
            $CanclledComments,  // CanclledComments
            $UserID,            // ApprovalDetailsByID
            $UserID             // UserID
        ];

        $stmtOrder = sqlsrv_query($conn, $sqlInsertApprovalDetails, $paramsOrder);
        if ($stmtOrder === false) {
            echo json_encode(["error" => "Error creating approval details", "details" => sqlsrv_errors()]);
            return;
        }

        // Step 4: Update sndVisitPlans
        $sqlUpdateVisitPlan = "UPDATE sndVisitPlans SET Status = ?, AppStatus = ? WHERE VisitPlanID = ?";
        $paramsUpdate = [$newStatus, $newAppStatus, $VisitPlanID];

        $stmtUpdate = sqlsrv_query($conn, $sqlUpdateVisitPlan, $paramsUpdate);
        if ($stmtUpdate === false) {
            echo json_encode(["error" => "Failed to update VisitPlan", "details" => sqlsrv_errors()]);
            return;
        }

        // Success response
        echo json_encode(["success" => true, "message" => "Canceled/Rejected details created and VisitPlan updated successfully."]);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function get_all_visit_plans_Users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) {   
    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo,' - ', (select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ',
			(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)
			) as VPInfo2
			,CONCAT((SELECT CategoryName FROM sndCategorydata WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
			 AND CategoryType = 'institution-type'),'-',          
			case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as StatusName
           ,Status
           ,AppStatus
           ,UserID
            ,ContactName 
            ,ContactNumber
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    order by VisitPlanID desc";

    $stmt = sqlsrv_query($conn, $sql);

} else {

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo,' - ', (select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1
			 ,CONCAT(convert(char(10),VisitPlanDate,105),' - ',
			(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)
			) as VPInfo2
			,CONCAT((SELECT CategoryName FROM sndCategorydata WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
			 AND CategoryType = 'institution-type'),'-',          
			case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as StatusName
           ,Status
           ,AppStatus
           ,UserID
            ,ContactName 
            ,ContactNumber
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    where 

    UserID = ?
   or  UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)
   or  UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))
   or  UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)))
   or  UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))))

    order by VisitPlanID desc";

$params = [$UserID, $UserID, $UserID, $UserID, $UserID];
$stmt = sqlsrv_query($conn, $sql, $params);


}

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


function get_all_userslog($conn) {
    $sql = "SELECT 
    ul.logid,
    ul.userid,
    uv.employeeid,
    uv.empname,
    uv.designation,
    uv.phone,
    ul.loginTime,
    ul.status
FROM snduserlog ul
INNER JOIN snduserview uv ON ul.userid = uv.userid
ORDER BY ul.loginTime DESC";
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

function get_all_visit_plans($conn) {
    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo,' - ', (select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1
			,convert(char(10),VisitPlanDate,105) as VPInfo2
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VPInfo2
			,case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as StatusName
           ,Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans order by VisitPlanID desc";
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

function profileview($conn, $UserID) {
    header('Content-Type: application/json');

    // 1. User Profile Info
    $sqlProfile = "
    SELECT 
    u.UserID, 
    u.EmployeeID, 
    u.EmpName, 
    u.DesignationID,
    (SELECT TOP 1 [name] FROM HrmDesignations WHERE CmnCompanyId = 2 AND ID = u.DesignationID) AS Designation,
    u.Username, 
    u.Email, 
    u.Phone, 
    u.Address, 
    r.EmpName AS ReportingToUserID, 
    (SELECT TOP 1 [name] FROM HrmDesignations WHERE CmnCompanyId = 2 AND ID = r.DesignationID) AS RDesignation,

    -- New Field: Division Names for pre-2017 SQL Server
    (
        SELECT STUFF((
            SELECT DISTINCT ', ' + DivisionName
            FROM sndMapEmpRegion
            WHERE UserID = u.UserID
            FOR XML PATH(''), TYPE
        ).value('.', 'NVARCHAR(MAX)'), 1, 2, '')
    ) AS DivisionNames,

    u.Status, 
    u.CreatedAt, 
    u.ModifiedAt

FROM sndUsers u
LEFT JOIN sndUsers r ON u.ReportingToUserID = r.UserID 
WHERE u.UserID = ? AND u.Status = 1";
    $stmtProfile = sqlsrv_query($conn, $sqlProfile, [$UserID]);
    if ($stmtProfile === false) {
        echo json_encode(["error" => "Error fetching user profile", "details" => sqlsrv_errors()]);
        return;
    }
    $userProfile = sqlsrv_fetch_array($stmtProfile, SQLSRV_FETCH_ASSOC);

    // 2. Subordinates
    $sqlSubordinates = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY u.UserID) AS SL,
            u.UserID, 
            u.EmployeeID, 
            u.EmpName, 
            u.DesignationID,
            (SELECT name FROM HrmDesignations WHERE CmnCompanyId = 2 AND ID = u.DesignationID) AS Designation,
            u.Username, 
            u.Email, 
            u.Phone, 
            u.Address, 
            u.ReportingToUserID, 
            u.Status, 
            u.CreatedAt, 
            u.ModifiedAt,
            (
                STUFF((
                    SELECT ' | ' + COALESCE(mr.ThanaName, '') + ', ' + COALESCE(mr.DistrictName, '') 
                    FROM sndMapEmpRegion mr 
                    WHERE mr.UserID = u.UserID
                    FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 3, '')
            ) AS CoveredArea
        FROM sndUsers u
        WHERE u.ReportingToUserID = ? AND u.status = 1
    ";
    $stmtSubs = sqlsrv_query($conn, $sqlSubordinates, [$UserID]);
    $subordinates = [];
    if ($stmtSubs !== false) {
        while ($row = sqlsrv_fetch_array($stmtSubs, SQLSRV_FETCH_ASSOC)) {
            $row['CoveredArea'] = $row['CoveredArea'] ? [$row['CoveredArea']] : [];
            $subordinates[] = $row;
        }
    }

    // 3. Party List
    $partySql = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY PartyID) AS SL,
            PartyName, Address, AreaName, pm.ThanaName, pm.DistrictName, pm.DivisionName,
            STUFF((
                SELECT ', ' + pa.RegionName 
                FROM sndPartyArea pa 
                WHERE pa.PartyID = PM.PartyID 
                FOR XML PATH(''), TYPE
            ).value('.', 'NVARCHAR(MAX)'), 1, 2, '') AS CoverArea 
        FROM sndPartyMaster pm
        JOIN sndRegionView rv ON pm.DistrictID = rv.DistrictID 
            AND pm.ThanaID = rv.ThanaID AND pm.DivisionID = rv.DivisionID
        WHERE pm.DistrictID IN (
            SELECT mr.DistrictID FROM sndMapEmpRegion mr WHERE UserID = ?
        )
    ";
    $partyStmt = sqlsrv_query($conn, $partySql, [$UserID]);
    $partyList = [];
    if ($partyStmt !== false) {
        while ($row = sqlsrv_fetch_array($partyStmt, SQLSRV_FETCH_ASSOC)) {
            $partyList[] = $row;
        }
    }

    // 4. Institutions with Teachers
    $institutionSql = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY InstitutionID) AS SL,
            InstitutionID, InstitutionName, AreaName, ThanaName, DistrictName, DivisionName 
        FROM sndinstitutions
        JOIN sndRegionView ON sndinstitutions.RegionID = sndRegionView.AreaID 
        WHERE UserID = ? 
        ORDER BY InstitutionName
    ";
    $institutionStmt = sqlsrv_query($conn, $institutionSql, [$UserID]);
    $institutions = [];

    // Prepare teacher SQL for each institution
    $teacherSql = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY InstitutionDetailsID) AS SL,
            TeacherName, 
            Designation, 
            ContactPhone, 
            (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE CategoryType = 'books-category' 
             AND sndCategorydata.id = d.sndClassID) AS BooksGroup,
            (SELECT ProductName 
             FROM sndProducts 
             WHERE ProductID = d.sndSubjectID) AS BooksName
        FROM sndInstitutionDetails d
        WHERE InstitutionID = ?
    ";

    if ($institutionStmt !== false) {
        while ($inst = sqlsrv_fetch_array($institutionStmt, SQLSRV_FETCH_ASSOC)) {
            // Fetch teachers for this institution
            $teacherStmt = sqlsrv_query($conn, $teacherSql, [$inst['InstitutionID']]);
            $teachers = [];
            if ($teacherStmt !== false) {
                while ($t = sqlsrv_fetch_array($teacherStmt, SQLSRV_FETCH_ASSOC)) {
                    $teachers[] = $t;
                }
            }
            $inst['Teachers'] = $teachers;
            $institutions[] = $inst;
        }
    }

    // 5. Covered Areas
    $sqlArea = "
        SELECT AreaName, ThanaName, DistrictName, DivisionName 
        FROM sndMapEmpRegion 
        WHERE UserID = ?
    ";
    $stmtArea = sqlsrv_query($conn, $sqlArea, [$UserID]);
    $coveredAreas = [];
    if ($stmtArea !== false) {
        while ($row = sqlsrv_fetch_array($stmtArea, SQLSRV_FETCH_ASSOC)) {
            $coveredAreas[] = $row;
        }
    }

    // Final response structure
    $response = [
        "UserProfile"   => $userProfile,
        "CoveredAreas"  => $coveredAreas,
        "Subordinates"  => $subordinates,
        "Parties"       => $partyList,
        "Institutions"  => $institutions
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
}


function profileview1($conn, $UserID) {
    header('Content-Type: application/json');

    // SQL1 - User Profile Info
    $sqlProfile = "
        SELECT 
            u.UserID, 
            u.EmployeeID, 
            u.EmpName, 
            u.DesignationID,
            (SELECT name FROM HrmDesignations WHERE CmnCompanyId = 2 AND HrmDesignations.ID = u.DesignationID) AS Designation,
            u.Username, 
            u.Email, 
            u.Phone, 
            u.Address, 
            r.EmpName AS ReportingToUserID, 
            (SELECT name FROM HrmDesignations WHERE CmnCompanyId = 2 AND HrmDesignations.ID = r.DesignationID) AS RDesignation,
            u.Status, 
            u.CreatedAt, 
            u.ModifiedAt
        FROM sndUsers u
        LEFT JOIN sndUsers r ON u.ReportingToUserID = r.UserID 
        WHERE u.UserID = ? AND u.status = 1
    ";

    $stmtProfile = sqlsrv_query($conn, $sqlProfile, [$UserID]);
    if ($stmtProfile === false) {
        echo json_encode(["error" => "Error fetching user profile", "details" => sqlsrv_errors()]);
        return;
    }
    $userProfile = sqlsrv_fetch_array($stmtProfile, SQLSRV_FETCH_ASSOC);

    // SQL2 - Subordinates with covered areas
    $sqlSubordinates = "
        SELECT 
            ROW_NUMBER() OVER (ORDER BY u.UserID) AS SL,
            u.UserID, 
            u.EmployeeID, 
            u.EmpName, 
            u.DesignationID,
            (SELECT name 
             FROM HrmDesignations 
             WHERE CmnCompanyId = 2 
             AND HrmDesignations.ID = u.DesignationID) AS Designation,
            u.Username, 
            u.Email, 
            u.Phone, 
            u.Address, 
            u.ReportingToUserID, 
            u.Status, 
            u.CreatedAt, 
            u.ModifiedAt,
            (
                STUFF((
                    SELECT ' | ' + COALESCE(mr.ThanaName, '') + ', ' + COALESCE(mr.DistrictName, '') 
                    FROM sndMapEmpRegion mr 
                    WHERE mr.UserID = u.UserID
                    FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 3, '')
            ) AS CoveredArea
        FROM sndUsers u
        WHERE u.ReportingToUserID = ? AND u.status = 1
    ";

    $stmtSubs = sqlsrv_query($conn, $sqlSubordinates, [$UserID]);
$subordinates = [];
if ($stmtSubs !== false) {
    while ($row = sqlsrv_fetch_array($stmtSubs, SQLSRV_FETCH_ASSOC)) {
        // Convert CoveredArea to array if not null
        $row['CoveredArea'] = $row['CoveredArea'] ? [$row['CoveredArea']] : [];
        $subordinates[] = $row;
    }
}
    // SQL3 - User's Own Covered Area
    $sqlArea = "
        SELECT AreaName, ThanaName, DistrictName, DivisionName 
        FROM sndMapEmpRegion 
        WHERE UserID = ?
    ";

    $stmtArea = sqlsrv_query($conn, $sqlArea, [$UserID]);
    $coveredAreas = [];
    if ($stmtArea !== false) {
        while ($row = sqlsrv_fetch_array($stmtArea, SQLSRV_FETCH_ASSOC)) {
            $coveredAreas[] = $row;
        }
    }

    // Final response structure
    $response = [
        "UserProfile" => $userProfile,
        "CoveredAreas" => $coveredAreas,
        "Subordinates" => $subordinates
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
}


function get_visit_entryforApproval($conn, $VisitPlanID) {
    try {
        // Validate VisitPlanID
        if (empty($VisitPlanID)) {
            throw new Exception("VisitPlanID is required");
        }

        // Base URL for images
        $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);

        // Query to fetch visit plan details
        $visitPlanSql = "SELECT 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONVERT(CHAR(11), VisitPlanDate, 105) AS VPInfo2,

case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end as VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 105) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstitutionTypeName,
            case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            AppStatus,
            UserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt,
            FORMAT(CheckInTime, 'hh:mm tt') AS CheckInTime, FORMAT(CheckOutTime, 'hh:mm tt') AS CheckOutTime,
            Latitude, Longitude,
            CONVERT(CHAR(11), VisitEntryDate, 105) AS VisitEntryDate, VEStatus
        FROM sndVisitPlans WHERE VisitPlanID = ?";

        $visitPlanStmt = sqlsrv_query($conn, $visitPlanSql, [$VisitPlanID]);
        if ($visitPlanStmt === false) {
            throw new Exception("Error fetching visit plan: " . print_r(sqlsrv_errors(), true));
        }

        $visitPlan = sqlsrv_fetch_array($visitPlanStmt, SQLSRV_FETCH_ASSOC);
        if (!$visitPlan) {
            throw new Exception("Visit plan not found for VisitPlanID: $VisitPlanID");
        }

        // Query to fetch approval details
        $sqlApprovals = "SELECT
            MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CheckedDate,
            MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS CheckedBy,
            MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.CheckedComments, '') END) AS CheckedComments,
            MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
            MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
            MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,
            MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
            MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
            MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.AppComments, '') END) AS AppComments,
            MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
            MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
            MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,
            MAX(CASE WHEN d.AppStatus = 6 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
            MAX(CASE WHEN d.AppStatus = 6 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
            MAX(CASE WHEN d.AppStatus = 6 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
        FROM sndApprovalDetails d
        INNER JOIN sndUserView u ON d.UserID = u.UserID
        WHERE d.ApprovalType = 'sndVisitPlansEntry' AND d.ApprovalTypeID = ?";

        $visitPlanStmt1 = sqlsrv_query($conn, $sqlApprovals, [$VisitPlanID]);
        if ($visitPlanStmt1 === false) {
            throw new Exception("Error fetching approval details: " . print_r(sqlsrv_errors(), true));
        }

        $visitApprovalsPlan = sqlsrv_fetch_array($visitPlanStmt1, SQLSRV_FETCH_ASSOC);

        // Query to fetch visit plan details
        $detailsSql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanDetailID) AS SL,
            CONCAT(TeacherName,', ',Designation,', ',Phone) as Tinfo1,
            CONCAT((SELECT ProductName FROM sndProducts WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID),', ',StudentNo) as Tinfo2,
            CASE 
                WHEN DonationAmount > 0 THEN CONCAT('BD_Exp @BDT. ', DonationAmount)
                WHEN SpecimenQty > 0 THEN CONCAT('Specimen Qty. ', SpecimenQty)
                ELSE ''
            END Tinfo3,
            VisitPlanDetailID, TeacherName, Designation, Phone, 
            FinancialYearID, 
            (SELECT name FROM CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndVisitPlanDetails.FinancialYearID) AS FinancialYear,
            ProductCategoryID, 
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'books-category' AND sndCategorydata.id = sndVisitPlanDetails.ProductCategoryID) AS BooksGroup,
            ProductID, 
            (SELECT ProductName FROM sndProducts WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID) AS ProductName,
            StudentNo, DonationAmount, SpecimenQty, CreatedAt 
        FROM sndVisitPlanDetails WHERE VisitPlanID = ?";

        $detailsStmt = sqlsrv_query($conn, $detailsSql, [$VisitPlanID]);
        if ($detailsStmt === false) {
            throw new Exception("Error fetching visit plan details: " . print_r(sqlsrv_errors(), true));
        }

        $details = [];
        while ($row = sqlsrv_fetch_array($detailsStmt, SQLSRV_FETCH_ASSOC)) {
            $details[] = $row;
        }

        // Query to fetch TADA details
        $tadaSql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY vpt.sndVisitPlanTADADetailsID) AS SL,
            vpt.sndVisitPlanTADADetailsID, 
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'TA/DA Allowance' AND sndCategorydata.id = vpt.TADACategoryID) AS TAinfo1,
            tm.ThansportMedia AS TAinfo2,
            concat(TAFrom,'',TATo,'-', vpt.Amount) AS TAinfo3,
            vpt.BillTicketImagePath AS TAinfo4,
            VisitPlanID,
            vpt.TADACategoryID, 
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'TA/DA Allowance' AND sndCategorydata.id = vpt.TADACategoryID) AS TADACategory,
            vpt.ThansportMediaID,
            tm.ThansportMedia,
            vpt.TAFrom,
            vpt.TATo,
            vpt.Remarks,
            vpt.BillTicketImagePath,
            vpt.Amount, 
            vpt.CreatedAt 
        FROM dbo.sndVisitPlanTADADetails vpt
        LEFT JOIN sndThansportMedia tm ON vpt.ThansportMediaID = tm.ThansportMediaID 
        WHERE VisitPlanID = ?";

        $tadaStmt = sqlsrv_query($conn, $tadaSql, [$VisitPlanID]);
        if ($tadaStmt === false) {
            throw new Exception("Error fetching TADA details: " . print_r(sqlsrv_errors(), true));
        }

 $tadaDetails = [];
        while ($row = sqlsrv_fetch_array($tadaStmt, SQLSRV_FETCH_ASSOC)) {
            if (!empty($row['BillTicketImagePath'])) {
                $row['BillTicketImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['BillTicketImagePath'], '/');
            }
            $tadaDetails[] = $row;
        }




        // Combine all data into a single response
        $response = [
            "VisitPlan" => $visitPlan,
            "visitApprovalsPlan" => $visitApprovalsPlan,
            "Details" => $details,
            "TADADetails" => $tadaDetails
        ];

        echo json_encode($response);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function get_visit_entryforApproval1($conn, $VisitPlanID) {
    try {
        // Validate VisitPlanID
        if (empty($VisitPlanID)) {
            throw new Exception("VisitPlanID is required");
        }
        
     
        // Query to fetch visit plan details
        $visitPlanSql = "SELECT 
                           VisitPlanID,
                VisitPlanNo AS VPInfo1,
                CONVERT(CHAR(11), VisitPlanDate, 105) AS VPInfo2,
                (SELECT InstitutionName 
                 FROM sndInstitutions 
                 WHERE InstitutionID = sndVisitPlans.InstitutionID) AS VPInfo3,
                VisitPlanNo,
                CONVERT(CHAR(11), VisitPlanDate, 105) AS VisitPlanDate,
                InstitutionTypeID,
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                   AND CategoryType = 'institution-type') AS InstitutionTypeName,
                (SELECT InstitutionName 
                 FROM sndInstitutions 
                 WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName,
                InstitutionID,
                PurposeID,
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
                VisitUserID,
                (SELECT empname 
                 FROM sndusers 
                 WHERE sndusers.userID = VisitUserID) AS VisitUserName,
                Status,
                AppStatus,
                UserID,
                (SELECT empname 
                 FROM sndusers 
                 WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
                CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
                CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt,
                 FORMAT(CheckInTime, 'hh:mm tt') AS CheckInTime, FORMAT(CheckOutTime, 'hh:mm tt') AS CheckOutTime, Latitude, 
                            Longitude, 
                            CONVERT(CHAR(11), VisitEntryDate, 105) AS VisitEntryDate, 
                            VEStatus
            FROM sndVisitPlans
            WHERE  VisitPlanID = ?";
        
        $visitPlanStmt = sqlsrv_query($conn, $visitPlanSql, [$VisitPlanID]);
        if ($visitPlanStmt === false) {
            throw new Exception("Error fetching visit plan: " . print_r(sqlsrv_errors(), true));
        }

        $visitPlan = sqlsrv_fetch_array($visitPlanStmt, SQLSRV_FETCH_ASSOC);
        if (!$visitPlan) {
            throw new Exception("Visit plan not found for VisitPlanID: $VisitPlanID");
        }

 // Query to fetch approval details
    $sqlApprovals = "
        SELECT
            MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CheckedDate,
            MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS CheckedBy,
            MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.CheckedComments, '') END) AS CheckedComments,

            MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
            MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
            MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,

            MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
            MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
            MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.AppComments, '') END) AS AppComments,

            MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
            MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
            MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,

            MAX(CASE WHEN d.AppStatus = 6 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
            MAX(CASE WHEN d.AppStatus = 6 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
            MAX(CASE WHEN d.AppStatus = 6 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
        FROM 
            sndApprovalDetails d
        INNER JOIN 
            sndUserView u ON d.UserID = u.UserID
        WHERE 
            d.ApprovalType = 'sndVisitPlansEntry' 
            AND d.ApprovalTypeID = ?
    ";

  $visitPlanStmt1 = sqlsrv_query($conn, $sqlApprovals, [$VisitPlanID]);
        if ($visitPlanStmt1 === false) {
            throw new Exception("Error fetching visit plan: " . print_r(sqlsrv_errors(), true));
        }

        $visitApprovalsPlan = sqlsrv_fetch_array($visitPlanStmt1, SQLSRV_FETCH_ASSOC);
        if (!$visitApprovalsPlan) {
            throw new Exception("Visit plan not found for VisitPlanID: $VisitPlanID");
        }

        // Query to fetch visit plan details
        $detailsSql = "
           SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanDetailID) AS SL,
            CONCAT(TeacherName,', ',Designation,', ',Phone) as Tinfo1,
            CONCAT((SELECT ProductName 
                     FROM sndProducts 
                     WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID),', ',StudentNo) as Tinfo2,
            case when DonationAmount > 0 then CONCAT('BD_Exp @BDT. ', DonationAmount)
                 when SpecimenQty > 0 then CONCAT('Specimen Qty. ', SpecimenQty)
                 else '' end Tinfo3,
                           VisitPlanDetailID, TeacherName, Designation, Phone, 
                           FinancialYearID, 
						   (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndVisitPlanDetails.FinancialYearID) as FinancialYear,
						   ProductCategoryID, 
						   (SELECT CategoryName 
                     FROM sndCategorydata 
                     WHERE CategoryType = 'books-category' 
                       AND sndCategorydata.id = sndVisitPlanDetails.ProductCategoryID) AS BooksGroup,
						   ProductID, 
						   (SELECT ProductName 
                     FROM sndProducts 
                     WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID) AS ProductName,
						   StudentNo, 
                           DonationAmount, SpecimenQty, CreatedAt 
                       FROM sndVisitPlanDetails  
            WHERE VisitPlanID = ?";
        
        $detailsStmt = sqlsrv_query($conn, $detailsSql, [$VisitPlanID]);
        if ($detailsStmt === false) {
            throw new Exception("Error fetching visit plan details: " . print_r(sqlsrv_errors(), true));
        }

        $details = [];
        while ($row = sqlsrv_fetch_array($detailsStmt, SQLSRV_FETCH_ASSOC)) {
            $details[] = $row;
        }

        // Query to fetch TADA details
        $tadaSql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY vpt.sndVisitPlanTADADetailsID) AS SL,
    vpt.sndVisitPlanTADADetailsID, 
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'TA/DA Allowance' 
     AND sndCategorydata.id = vpt.TADACategoryID) as TAinfo1,
            tm.ThansportMedia as TAinfo2,
            vpt.Amount as TAinfo3,
	VisitPlanID,
    vpt.TADACategoryID, 
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'TA/DA Allowance' 
     AND sndCategorydata.id = vpt.TADACategoryID) AS TADACategory,
    vpt.ThansportMediaID,
    tm.ThansportMedia,
    vpt.Amount, 
    vpt.CreatedAt 
FROM dbo.sndVisitPlanTADADetails vpt
LEFT JOIN sndThansportMedia tm 
    ON vpt.ThansportMediaID = tm.ThansportMediaID 
        WHERE VisitPlanID = ?";
        
        $tadaStmt = sqlsrv_query($conn, $tadaSql, [$VisitPlanID]);
        if ($tadaStmt === false) {
            throw new Exception("Error fetching TADA details: " . print_r(sqlsrv_errors(), true));
        }

        $tadaDetails = [];
        while ($row = sqlsrv_fetch_array($tadaStmt, SQLSRV_FETCH_ASSOC)) {
            $tadaDetails[] = $row;
        }

        // Combine all data into a single response
        $response = [
            "VisitPlan" => $visitPlan,
			"visitApprovalsPlan" => $visitApprovalsPlan,
            "Details" => $details,
            "TADADetails" => $tadaDetails
        ];

        // Return success response
        echo json_encode($response);
    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function get_visit_entryall($conn, $VisitPlanID) {
    try {
        if (empty($VisitPlanID)) {
            throw new Exception("VisitPlanID is required");
        }

        // Dynamically determine the base URL
        $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);

        $visitPlanSql = "SELECT 
    VisitPlanID,
    VisitPlanNo AS VPInfo1,
    CONVERT(CHAR(11), VisitPlanDate, 105) AS VPInfo2,
    CASE 
        WHEN PartyID IS NULL THEN 
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
        ELSE 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID)
    END AS VPInfo3,
    
    VisitPlanNo,
    CONVERT(CHAR(11), VisitPlanDate, 105) AS VisitPlanDate,
    InstitutionTypeID,
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
     AND CategoryType = 'institution-type') AS InstitutionTypeName,
    
    CASE 
        WHEN PartyID IS NULL THEN 
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
        ELSE 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID)
    END AS InstituteName,

    -- New Field: InstituteAddres
    CASE 
        WHEN PartyID IS NULL THEN 
            (SELECT Address 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
        ELSE NULL
    END AS InstituteAddres,
    
    InstitutionID,
    PurposeID,
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' 
     AND id = PurposeID) AS PurposeName,
    
    VisitUserID,
    (SELECT empname 
     FROM sndusers 
     WHERE sndusers.userID = VisitUserID) AS VisitUserName,
    
    Status,
    AppStatus,
    UserID,
    (SELECT empname 
     FROM sndusers 
     WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
    
    (SELECT Designation 
     FROM sndUserView 
     WHERE sndUserView.userID = sndVisitPlans.UserID) AS Designation,
    
    CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
    CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt,
    FORMAT(CheckInTime, 'hh:mm tt') AS CheckInTime, 
    FORMAT(CheckOutTime, 'hh:mm tt') AS CheckOutTime, 
    Latitude, 
    Longitude, 
    CONVERT(CHAR(11), VisitEntryDate, 105) AS VisitEntryDate, 
    VEStatus
FROM sndVisitPlans
        WHERE VisitPlanID = ?";

        $visitPlanStmt = sqlsrv_query($conn, $visitPlanSql, [$VisitPlanID]);
        if ($visitPlanStmt === false) {
            throw new Exception("Error fetching visit plan: " . print_r(sqlsrv_errors(), true));
        }

        $visitPlan = sqlsrv_fetch_array($visitPlanStmt, SQLSRV_FETCH_ASSOC);
        if (!$visitPlan) {
            throw new Exception("Visit plan not found for VisitPlanID: $VisitPlanID");
        }

        $detailsSql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanDetailID) AS SL,
            CONCAT(TeacherName, ', ', Designation, ', ', Phone) as Tinfo1,
            CONCAT((SELECT ProductName FROM sndProducts WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID), ', ', StudentNo) as Tinfo2,
            CASE 
                WHEN DonationAmount > 0 THEN CONCAT('BD_Exp @BDT. ', DonationAmount)
                WHEN SpecimenQty > 0 THEN CONCAT('Specimen Qty. ', SpecimenQty)
                ELSE '' 
            END Tinfo3,
            VisitPlanDetailID, TeacherName, Designation, Phone, 
            FinancialYearID, 
            (SELECT name FROM CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndVisitPlanDetails.FinancialYearID) AS FinancialYear,
            ProductCategoryID, 
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'books-category' AND sndCategorydata.id = sndVisitPlanDetails.ProductCategoryID) AS BooksGroup,
            ProductID, 
            (SELECT ProductName FROM sndProducts WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID) AS ProductName,
            StudentNo, DonationAmount, SpecimenQty, CreatedAt 
        FROM sndVisitPlanDetails  
        WHERE VisitPlanID = ?";

        $detailsStmt = sqlsrv_query($conn, $detailsSql, [$VisitPlanID]);
        if ($detailsStmt === false) {
            throw new Exception("Error fetching visit plan details: " . print_r(sqlsrv_errors(), true));
        }

        $details = [];
        while ($row = sqlsrv_fetch_array($detailsStmt, SQLSRV_FETCH_ASSOC)) {
            $details[] = $row;
        }

        $tadaSql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY vpt.sndVisitPlanTADADetailsID) AS SL,
            vpt.sndVisitPlanTADADetailsID, 
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'TA/DA Allowance' AND sndCategorydata.id = vpt.TADACategoryID) AS TAinfo1,
            tm.ThansportMedia AS TAinfo2,
            concat(TAFrom,' To ',TATo,'-', vpt.Amount) AS TAinfo3,
            vpt.BillTicketImagePath as TAinfo4,
            VisitPlanID,
            vpt.TADACategoryID, 
            (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'TA/DA Allowance' AND sndCategorydata.id = vpt.TADACategoryID) AS TADACategory,
            vpt.ThansportMediaID,
            tm.ThansportMedia,
            vpt.Amount,
            vpt.Remarks,
            TAFrom,
            TATo,
            vpt.BillTicketImagePath,
            vpt.CreatedAt 
        FROM dbo.sndVisitPlanTADADetails vpt
        LEFT JOIN sndThansportMedia tm ON vpt.ThansportMediaID = tm.ThansportMediaID 
        WHERE VisitPlanID = ?";

        $tadaStmt = sqlsrv_query($conn, $tadaSql, [$VisitPlanID]);
        if ($tadaStmt === false) {
            throw new Exception("Error fetching TADA details: " . print_r(sqlsrv_errors(), true));
        }

        $tadaDetails = [];
        while ($row = sqlsrv_fetch_array($tadaStmt, SQLSRV_FETCH_ASSOC)) {
            if (!empty($row['BillTicketImagePath'])) {
                $row['BillTicketImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['BillTicketImagePath'], '/');
            }
            $tadaDetails[] = $row;
        }

        $response = [
            "VisitPlan" => $visitPlan,
            "Details" => $details,
            "TADADetails" => $tadaDetails
        ];

        echo json_encode($response);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function get_visit_entryall1($conn, $VisitPlanID) {
    try {
        // Validate VisitPlanID
        if (empty($VisitPlanID)) {
            throw new Exception("VisitPlanID is required");
        }

        // Query to fetch visit plan details
        $visitPlanSql = "SELECT 
                           VisitPlanID,
                VisitPlanNo AS VPInfo1,
                CONVERT(CHAR(11), VisitPlanDate, 105) AS VPInfo2,
                (SELECT InstitutionName 
                 FROM sndInstitutions 
                 WHERE InstitutionID = sndVisitPlans.InstitutionID) AS VPInfo3,
                VisitPlanNo,
                CONVERT(CHAR(11), VisitPlanDate, 105) AS VisitPlanDate,
                InstitutionTypeID,
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                   AND CategoryType = 'institution-type') AS InstitutionTypeName,
                (SELECT InstitutionName 
                 FROM sndInstitutions 
                 WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName,
                InstitutionID,
                PurposeID,
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
                VisitUserID,
                (SELECT empname 
                 FROM sndusers 
                 WHERE sndusers.userID = VisitUserID) AS VisitUserName,
                Status,
                AppStatus,
                UserID,
                (SELECT empname 
                 FROM sndusers 
                 WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
                CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
                CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt,
                 FORMAT(CheckInTime, 'hh:mm tt') AS CheckInTime, FORMAT(CheckOutTime, 'hh:mm tt') AS CheckOutTime, Latitude, 
                            Longitude, 
                            CONVERT(CHAR(11), VisitEntryDate, 105) AS VisitEntryDate, 
                            VEStatus
            FROM sndVisitPlans  
                         WHERE VisitPlanID = ?";
        $visitPlanStmt = sqlsrv_query($conn, $visitPlanSql, [$VisitPlanID]);
        if ($visitPlanStmt === false) {
            throw new Exception("Error fetching visit plan: " . print_r(sqlsrv_errors(), true));
        }

        $visitPlan = sqlsrv_fetch_array($visitPlanStmt, SQLSRV_FETCH_ASSOC);
        if (!$visitPlan) {
            throw new Exception("Visit plan not found for VisitPlanID: $VisitPlanID");
        }

        // Query to fetch visit plan details
        $detailsSql = "
			SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanDetailID) AS SL,
            CONCAT(TeacherName,', ',Designation,', ',Phone) as Tinfo1,
            CONCAT((SELECT ProductName 
                     FROM sndProducts 
                     WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID),', ',StudentNo) as Tinfo2,
            case when DonationAmount > 0 then CONCAT('BD_Exp @BDT. ', DonationAmount)
                 when SpecimenQty > 0 then CONCAT('Specimen Qty. ', SpecimenQty)
                 else '' end Tinfo3,
                           VisitPlanDetailID, TeacherName, Designation, Phone, 
                           FinancialYearID, 
						   (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndVisitPlanDetails.FinancialYearID) as FinancialYear,
						   ProductCategoryID, 
						   (SELECT CategoryName 
                     FROM sndCategorydata 
                     WHERE CategoryType = 'books-category' 
                       AND sndCategorydata.id = sndVisitPlanDetails.ProductCategoryID) AS BooksGroup,
						   ProductID, 
						   (SELECT ProductName 
                     FROM sndProducts 
                     WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID) AS ProductName,
						   StudentNo, 
                           DonationAmount, SpecimenQty, CreatedAt 
                       FROM sndVisitPlanDetails  
                       WHERE VisitPlanID = ?";
        $detailsStmt = sqlsrv_query($conn, $detailsSql, [$VisitPlanID]);
        if ($detailsStmt === false) {
            throw new Exception("Error fetching visit plan details: " . print_r(sqlsrv_errors(), true));
        }

        $details = [];
        while ($row = sqlsrv_fetch_array($detailsStmt, SQLSRV_FETCH_ASSOC)) {
            $details[] = $row;
        }

        // Query to fetch TADA details
        $tadaSql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY vpt.sndVisitPlanTADADetailsID) AS SL,
    vpt.sndVisitPlanTADADetailsID, 
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'TA/DA Allowance' 
     AND sndCategorydata.id = vpt.TADACategoryID) as TAinfo1,
            tm.ThansportMedia as TAinfo2,
            vpt.Amount as TAinfo3,
	VisitPlanID,
    vpt.TADACategoryID, 
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'TA/DA Allowance' 
     AND sndCategorydata.id = vpt.TADACategoryID) AS TADACategory,
    vpt.ThansportMediaID,
    tm.ThansportMedia,
    vpt.Amount, 
    vpt.CreatedAt 
FROM dbo.sndVisitPlanTADADetails vpt
LEFT JOIN sndThansportMedia tm 
    ON vpt.ThansportMediaID = tm.ThansportMediaID 
	where
                VisitPlanID = ?";
        $tadaStmt = sqlsrv_query($conn, $tadaSql, [$VisitPlanID]);
        if ($tadaStmt === false) {
            throw new Exception("Error fetching TADA details: " . print_r(sqlsrv_errors(), true));
        }

        $tadaDetails = [];
        while ($row = sqlsrv_fetch_array($tadaStmt, SQLSRV_FETCH_ASSOC)) {
            $tadaDetails[] = $row;
        }

        // Combine all data into a single response
        $response = [
            "VisitPlan" => $visitPlan,
            "Details" => $details,
            "TADADetails" => $tadaDetails
        ];

        // Return success response
        echo json_encode($response);
    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode(["error" => $e->getMessage()]);
    }
}




function get_VisitPlanEntryApproval($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) { 

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
		    ,VisitPlanNo as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
			CONCAT((SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type'),'-',
            case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end)  VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
		   ,status
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,EStatus
		   ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlansEntry' and sndStatus.Status = sndVisitPlans.EStatus) as EStatusName
		   ,EAppStatus
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
	where (select count(*) from sndVisitPlanTADADetails svptada where svptada.VisitPlanID = sndVisitPlans.VisitPlanID)>0 and
    VEStatus IN (1) and EStatus in (1,2,3)
	   order by VisitPlanID desc
       ";
    $params = [$UserID,$UserID,$UserID,$UserID,$UserID,$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

} else {

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
           VisitPlanID
           ,VisitPlanNo as VPInfo1
           ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
			CONCAT((SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type'),'-',
            case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end)  VPInfo3
           ,VisitPlanNo
          ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
          ,InstitutionTypeID
            ,(SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type') AS InstituteType
          ,case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end AS InstituteName
          ,InstitutionID
          ,PurposeID
          ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
          ,VisitUserID
          ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
          ,status
          ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
          ,AppStatus
          ,UserID
          ,EStatus
          ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlansEntry' and sndStatus.Status = sndVisitPlans.EStatus) as EStatusName
          ,EAppStatus
          ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
          ,convert(char(19),CreatedAt,120) as CreatedAt 
          ,convert(char(19),ModifiedAt,120) as ModifiedAt 
   FROM sndVisitPlans 
   where
       ( (select count(*) from sndVisitPlanTADADetails svptada where svptada.VisitPlanID = sndVisitPlans.VisitPlanID)>0 and
       EStatus IN (1) and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
           AND Status = 2 
           and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?)) 
       ) 
       OR   (select count(*) from sndVisitPlanTADADetails svptada where svptada.VisitPlanID = sndVisitPlans.VisitPlanID)>0 and
       EStatus IN (2) and (
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
           AND Status = 2 
           and sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)) )

       OR   (select count(*) from sndVisitPlanTADADetails svptada where svptada.VisitPlanID = sndVisitPlans.VisitPlanID)>0 and
       EStatus IN (3) and (
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
           AND Status = 2 
           and sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))
           
           )
       )";
   $params = [$UserID,$UserID,$UserID,$UserID,$UserID,$UserID];
   $stmt = sqlsrv_query($conn, $sql, $params);

}

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

function get_VisitPlanEntryApprovalnew($conn, $UserID,$VisitUserID) {

    if (in_array($UserID, [2851, 69, 1718, 1716])) {

        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONCAT(CONVERT(CHAR(10), VisitPlanDate, 105), ' - ', 
                (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID)
            ) AS VPInfo2,
            CONCAT(
                (SELECT CategoryName FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),
                '-',
                CASE 
                    WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                    ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
                END
            ) AS VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
            CASE 
                WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
            END AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlans' AND sndStatus.Status = sndVisitPlans.Status) AS StatusName,
            AppStatus,
            UserID,
            EStatus,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.EStatus) AS EStatusName,
            EAppStatus,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 
        FROM sndVisitPlans 
        WHERE 
            (SELECT COUNT(*) FROM sndVisitPlanTADADetails svptada 
             WHERE svptada.VisitPlanID = sndVisitPlans.VisitPlanID) > 0 
            AND VEStatus IN (1,2,3) 
            AND EStatus IN (1, 2, 3)
        ORDER BY VisitPlanID DESC";
        
        $params = [];
        $stmt = sqlsrv_query($conn, $sql, $params);

    } else {

        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONCAT(CONVERT(CHAR(10), VisitPlanDate, 105), ' - ', 
                (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID)
            ) AS VPInfo2,
            CONCAT(
                (SELECT CategoryName FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),
                '-',
                CASE 
                    WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                    ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
                END
            ) AS VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
            CASE 
                WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
            END AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.Status) AS StatusName,
            AppStatus,
            UserID,
            EStatus,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.EStatus) AS EStatusName,
            EAppStatus,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 
        FROM sndVisitPlans 
        WHERE 
		(VisitUserID in (?)) and
		VEStatus IN (1,2) and EStatus in(1,2)";
        
        $params = [$VisitUserID,$VisitUserID,$VisitUserID];
        $stmt = sqlsrv_query($conn, $sql, $params);
    
    }



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


function get_VisitPlanEntryApprovalnew1($conn, $UserID,$VisitUserID) {

    if (in_array($UserID, [2851, 69, 1718, 1716])) {

        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONCAT(CONVERT(CHAR(10), VisitPlanDate, 105), ' - ', 
                (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID)
            ) AS VPInfo2,
            CONCAT(
                (SELECT CategoryName FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),
                '-',
                CASE 
                    WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                    ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
                END
            ) AS VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
            CASE 
                WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
            END AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlans' AND sndStatus.Status = sndVisitPlans.Status) AS StatusName,
            AppStatus,
            UserID,
            EStatus,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.EStatus) AS EStatusName,
            EAppStatus,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 
        FROM sndVisitPlans 
        WHERE 
            (SELECT COUNT(*) FROM sndVisitPlanTADADetails svptada 
             WHERE svptada.VisitPlanID = sndVisitPlans.VisitPlanID) > 0 
            AND VEStatus IN (1,2,3) 
            AND EStatus IN (1, 2, 3)
        ORDER BY VisitPlanID DESC";
        
        $params = [];
        $stmt = sqlsrv_query($conn, $sql, $params);

    } else if (in_array($UserID, [366,
496,
393,
405,
430,
633,
237,
241,
257,
299,
340,
342,
355])){

        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONCAT(CONVERT(CHAR(10), VisitPlanDate, 105), ' - ', 
                (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID)
            ) AS VPInfo2,
            CONCAT(
                (SELECT CategoryName FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),
                '-',
                CASE 
                    WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                    ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
                END
            ) AS VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
            CASE 
                WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
            END AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlans' AND sndStatus.Status = sndVisitPlans.Status) AS StatusName,
            AppStatus,
            UserID,
            EStatus,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.EStatus) AS EStatusName,
            EAppStatus,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 
        FROM sndVisitPlans 
        WHERE VEStatus IN (1,2,3) and EStatus =1 AND VisitUserID = ?";
        
        $params = [$VisitUserID];
        $stmt = sqlsrv_query($conn, $sql, $params);
    } else if (in_array($UserID, [298,
344,
345,
354,
472,
258,
716])){

        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONCAT(CONVERT(CHAR(10), VisitPlanDate, 105), ' - ', 
                (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID)
            ) AS VPInfo2,
            CONCAT(
                (SELECT CategoryName FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),
                '-',
                CASE 
                    WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                    ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
                END
            ) AS VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
            CASE 
                WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
            END AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlans' AND sndStatus.Status = sndVisitPlans.Status) AS StatusName,
            AppStatus,
            UserID,
            EStatus,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.EStatus) AS EStatusName,
            EAppStatus,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 
        FROM sndVisitPlans 
        WHERE VEStatus IN (1,2,3) and EStatus =2 AND VisitUserID = ?";
        
        $params = [$VisitUserID];
        $stmt = sqlsrv_query($conn, $sql, $params);
    } else if (in_array($UserID, [298,705,
344,
345,
354,
472,
258,
716])){

        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
            VisitPlanID,
            VisitPlanNo AS VPInfo1,
            CONCAT(CONVERT(CHAR(10), VisitPlanDate, 105), ' - ', 
                (SELECT CategoryName FROM sndCategorydata WHERE CategoryType = 'visitpurpose' AND id = PurposeID)
            ) AS VPInfo2,
            CONCAT(
                (SELECT CategoryName FROM sndCategorydata 
                 WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),
                '-',
                CASE 
                    WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                    ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
                END
            ) AS VPInfo3,
            VisitPlanNo,
            CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
            InstitutionTypeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
            CASE 
                WHEN PartyID IS NULL THEN (SELECT InstitutionName FROM sndInstitutions WHERE InstitutionID = sndVisitPlans.InstitutionID)
                ELSE (SELECT PartyName FROM sndPartyMaster WHERE PartyID = sndVisitPlans.PartyID)
            END AS InstituteName,
            InstitutionID,
            PurposeID,
            (SELECT CategoryName FROM sndCategorydata 
             WHERE CategoryType = 'visitpurpose' AND id = PurposeID) AS PurposeName,
            VisitUserID,
            (SELECT empname FROM sndusers WHERE sndusers.userID = VisitUserID) AS VisitUserName,
            Status,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlans' AND sndStatus.Status = sndVisitPlans.Status) AS StatusName,
            AppStatus,
            UserID,
            EStatus,
            (SELECT Statusmeans FROM sndStatus WHERE StatusTables = 'sndVisitPlansEntry' AND sndStatus.Status = sndVisitPlans.EStatus) AS EStatusName,
            EAppStatus,
            (SELECT empname FROM sndusers WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,
            CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
            CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 
        FROM sndVisitPlans 
        WHERE VEStatus IN (1,2,3) and EStatus =3 AND VisitUserID = ?";
        
        $params = [$VisitUserID];
        $stmt = sqlsrv_query($conn, $sql, $params);
    }



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


function get_VisitPlanEntryApprovalComplete($conn, $UserID) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
		    ,VisitPlanNo as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VPInfo2
			,case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,EStatus
		   ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlansEntry' and sndStatus.Status = sndVisitPlans.EStatus) as EStatusName
		   ,EAppStatus
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    WHERE  VEStatus IN (1,2,3) and Status =2 and EStatus =3 and VisitUserID = ?
    ";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);



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

function get_VisitPlanEntryApprovalReject($conn, $UserID) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
		    ,VisitPlanNo as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VPInfo2
			,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,EStatus
		   ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlansEntry' and sndStatus.Status = sndVisitPlans.EStatus) as EStatusName
		   ,EAppStatus
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    WHERE Status =2 and EStatus =5";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);



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

function get_VisitPlanEntryApprovalCancelled($conn, $UserID) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
		    ,VisitPlanNo as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VPInfo2
			,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,EStatus
		   ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlansEntry' and sndStatus.Status = sndVisitPlans.EStatus) as EStatusName
		   ,EAppStatus
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    WHERE  Status =2 and EStatus =6";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);



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

function get_VisitPlanApprovalnew1($conn, $UserID) {

    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID <> 79
union
SELECT 
    ROW_NUMBER() OVER (ORDER BY svp.VisitPlanID) AS SL, 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONCAT(
        CONVERT(char(10), svp.VisitPlanDate, 105),
        ' - ',
         (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID)
    ) AS VPInfo2,
	CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
     case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID) end) as VPInfo3,

    svp.VisitPlanNo,
    CONVERT(char(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
     
    (SELECT InstitutionName 
     FROM sndInstitutions 
     WHERE InstitutionID = svp.InstitutionID) AS InstituteName,
     
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.VisitUserID) AS VisitUserName,
     
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE StatusTables = 'sndVisitPlans' AND Status = svp.Status) AS Status,
     
    svp.AppStatus,
    svp.UserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.UserID) AS LogUserName,
     
    CONVERT(char(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(char(19), svp.ModifiedAt, 120) AS ModifiedAt 

FROM sndVisitPlans svp
INNER JOIN sndStockInOutBDExpense sxp 
    ON svp.InstitutionID = sxp.InstitutionID 
   AND svp.VisitUserID = sxp.BDExpUserID
WHERE 
    svp.AppStatus IN (1) 
    AND svp.Status = 1 
    AND svp.PurposeID = 79;";
       $params = [$UserID, $UserID];
 }else {
    $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 
        and userid = ?
        
 /*       and PurposeID <> 79
		and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = sndVisitPlans.AppStatus) 
           and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?))
           */
union
SELECT 
    ROW_NUMBER() OVER (ORDER BY svp.VisitPlanID) AS SL, 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONCAT(
        CONVERT(char(10), svp.VisitPlanDate, 105),
        ' - ',
         (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID)
    ) AS VPInfo2,
	CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
     case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID) end) as VPInfo3,

    svp.VisitPlanNo,
    CONVERT(char(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
     
    (SELECT InstitutionName 
     FROM sndInstitutions 
     WHERE InstitutionID = svp.InstitutionID) AS InstituteName,
     
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.VisitUserID) AS VisitUserName,
     
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE StatusTables = 'sndVisitPlans' AND Status = svp.Status) AS Status,
     
    svp.AppStatus,
    svp.UserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.UserID) AS LogUserName,
     
    CONVERT(char(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(char(19), svp.ModifiedAt, 120) AS ModifiedAt 

FROM sndVisitPlans svp
INNER JOIN sndStockInOutBDExpense sxp 
    ON svp.InstitutionID = sxp.InstitutionID 
   AND svp.VisitUserID = sxp.BDExpUserID
WHERE 
    svp.AppStatus IN (1) 
    AND svp.Status = 1 
    AND svp.PurposeID = 79
	and
    (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = svp.AppStatus) 
           and (svp.UserID in (select userid from sndUsers where ReportingToUserID = ?));";
   $params = [$UserID, $UserID,$UserID];
  }

   
    $stmt = sqlsrv_query($conn, $sql, $params);



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


function get_VisitPlanApprovalnew($conn, $UserID) {

    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID <> 79
union
SELECT 
    ROW_NUMBER() OVER (ORDER BY svp.VisitPlanID) AS SL, 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONCAT(
        CONVERT(char(10), svp.VisitPlanDate, 105),
        ' - ',
         (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID)
    ) AS VPInfo2,
	CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
     case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID) end) as VPInfo3,

    svp.VisitPlanNo,
    CONVERT(char(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
     
    (SELECT InstitutionName 
     FROM sndInstitutions 
     WHERE InstitutionID = svp.InstitutionID) AS InstituteName,
     
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.VisitUserID) AS VisitUserName,
     
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE StatusTables = 'sndVisitPlans' AND Status = svp.Status) AS Status,
     
    svp.AppStatus,
    svp.UserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.UserID) AS LogUserName,
     
    CONVERT(char(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(char(19), svp.ModifiedAt, 120) AS ModifiedAt 

FROM sndVisitPlans svp
INNER JOIN sndStockInOutBDExpense sxp 
    ON svp.InstitutionID = sxp.InstitutionID 
   AND svp.VisitUserID = sxp.BDExpUserID
WHERE 
    svp.AppStatus IN (1) 
    AND svp.Status = 1 
    AND svp.PurposeID = 79;";
       $params = [$UserID, $UserID];
 }else {
    $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID <> 79
		and  UserID = ?
/*           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = sndVisitPlans.AppStatus) 
           and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?))
           */
union
SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID = 79
		and  UserID = ?
union
SELECT 
    ROW_NUMBER() OVER (ORDER BY svp.VisitPlanID) AS SL, 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONCAT(
        CONVERT(char(10), svp.VisitPlanDate, 105),
        ' - ',
         (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID)
    ) AS VPInfo2,
	CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
     case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID) end) as VPInfo3,

    svp.VisitPlanNo,
    CONVERT(char(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
     
    (SELECT InstitutionName 
     FROM sndInstitutions 
     WHERE InstitutionID = svp.InstitutionID) AS InstituteName,
     
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.VisitUserID) AS VisitUserName,
     
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE StatusTables = 'sndVisitPlans' AND Status = svp.Status) AS Status,
     
    svp.AppStatus,
    svp.UserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.UserID) AS LogUserName,
     
    CONVERT(char(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(char(19), svp.ModifiedAt, 120) AS ModifiedAt 

FROM sndVisitPlans svp
INNER JOIN sndStockInOutBDExpense sxp 
    ON svp.InstitutionID = sxp.InstitutionID 
   AND svp.VisitUserID = sxp.BDExpUserID
WHERE 
    svp.AppStatus IN (1) 
    AND svp.Status = 1 
    AND svp.PurposeID = 79
	and svp.VisitUserID = ?;";
  
  /*
  (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = svp.AppStatus) 
           and (svp.UserID in (select userid from sndUsers where ReportingToUserID = ?));";
           */
   $params = [$UserID, $UserID, $UserID];
  }

   
    $stmt = sqlsrv_query($conn, $sql, $params);



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


function get_VisitPlanApproval($conn, $UserID) {

    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID <> 79
union
SELECT 
    ROW_NUMBER() OVER (ORDER BY svp.VisitPlanID) AS SL, 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONCAT(
        CONVERT(char(10), svp.VisitPlanDate, 105),
        ' - ',
         (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID)
    ) AS VPInfo2,
	CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
     case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID) end) as VPInfo3,

    svp.VisitPlanNo,
    CONVERT(char(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
     
    (SELECT InstitutionName 
     FROM sndInstitutions 
     WHERE InstitutionID = svp.InstitutionID) AS InstituteName,
     
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.VisitUserID) AS VisitUserName,
     
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE StatusTables = 'sndVisitPlans' AND Status = svp.Status) AS Status,
     
    svp.AppStatus,
    svp.UserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.UserID) AS LogUserName,
     
    CONVERT(char(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(char(19), svp.ModifiedAt, 120) AS ModifiedAt 

FROM sndVisitPlans svp
INNER JOIN sndStockInOutBDExpense sxp 
    ON svp.InstitutionID = sxp.InstitutionID 
   AND svp.VisitUserID = sxp.BDExpUserID
WHERE 
    svp.AppStatus IN (1) 
    AND svp.Status = 1 
    AND svp.PurposeID = 79;";
       $params = [$UserID, $UserID];
 }else {
    $sql = "SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID <> 79
		and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = sndVisitPlans.AppStatus) 
           and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?))
union
SELECT 
        ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
               VisitPlanID
               ,VisitPlanNo as VPInfo1
               ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2,
				CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = sndVisitPlans.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
                 case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
               ,VisitPlanNo
              ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
              ,InstitutionTypeID
                ,(SELECT CategoryName 
                FROM sndCategorydata 
                WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
                  AND CategoryType = 'institution-type') AS InstituteType
              ,(SELECT InstitutionName 
                FROM sndInstitutions 
                WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
              ,InstitutionID
              ,PurposeID
              ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
              ,VisitUserID
              ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
              ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
              ,AppStatus
              ,UserID
              ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
              ,convert(char(19),CreatedAt,120) as CreatedAt 
              ,convert(char(19),ModifiedAt,120) as ModifiedAt 
       FROM sndVisitPlans 
      WHERE AppStatus IN (1) 
        and Status =1 and PurposeID = 79
		and
           (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = sndVisitPlans.AppStatus) 
           and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?))
union
SELECT 
    ROW_NUMBER() OVER (ORDER BY svp.VisitPlanID) AS SL, 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONCAT(
        CONVERT(char(10), svp.VisitPlanDate, 105),
        ' - ',
         (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID)
    ) AS VPInfo2,
	CONCAT((SELECT CategoryName 
         FROM sndCategorydata 
         WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type'),'-',
     case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID) end) as VPInfo3,

    svp.VisitPlanNo,
    CONVERT(char(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID AND CategoryType = 'institution-type') AS InstituteType,
     
    (SELECT InstitutionName 
     FROM sndInstitutions 
     WHERE InstitutionID = svp.InstitutionID) AS InstituteName,
     
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.VisitUserID) AS VisitUserName,
     
    (SELECT Statusmeans 
     FROM sndStatus 
     WHERE StatusTables = 'sndVisitPlans' AND Status = svp.Status) AS Status,
     
    svp.AppStatus,
    svp.UserID,
    
    (SELECT empname 
     FROM sndusers 
     WHERE userID = svp.UserID) AS LogUserName,
     
    CONVERT(char(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(char(19), svp.ModifiedAt, 120) AS ModifiedAt 

FROM sndVisitPlans svp
INNER JOIN sndStockInOutBDExpense sxp 
    ON svp.InstitutionID = sxp.InstitutionID 
   AND svp.VisitUserID = sxp.BDExpUserID
WHERE 
    svp.AppStatus IN (1) 
    AND svp.Status = 1 
    AND svp.PurposeID = 79
	and
    (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
           IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlans' AND sndApprovals.AppStatus = svp.AppStatus) 
           and (svp.UserID in (select userid from sndUsers where ReportingToUserID = ?));";
   $params = [$UserID, $UserID,$UserID, $UserID,$UserID, $UserID];
  }

   
    $stmt = sqlsrv_query($conn, $sql, $params);



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
function get_VisitPlanCompleteList($conn, $UserID) {
if (in_array($UserID, [2851,69,1718,1716])) {  

    $sql = "SELECT top 150
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo, ' - ',(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1

            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2
            ,CONCAT( case when PartyID is null then (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') 
	  	 when PartyID is not null then 'Party' end, '-',(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID), '-',		
			case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    where
			VEStatus =0
    order by VisitPlanID desc";
    $stmt = sqlsrv_query($conn, $sql);

} else {

    $sql = "SELECT top 80
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo, ' - ',(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1
           ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2
            ,CONCAT( case when PartyID is null then (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') 
	  	 when PartyID is not null then 'Party' end, '-',(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID), '-',		
			case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    where
    ( 
			VEStatus IN (0) and
            Status = 2 
			and (sndVisitPlans.UserID =?) 

/*		OR	VEStatus IN (0) and
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.AppStatus) 
            AND Status = 2 
			and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?)) ) 
        OR   VEStatus IN (0) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.AppStatus) 
            AND Status = 2 
			and sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)) )

		OR   VEStatus IN (0) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.AppStatus) 
            AND Status = 2 
			and sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))
			
			) */
        )
    order by VisitPlanID desc";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

}


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

function get_VisitPlanCompleteEntryList($conn, $UserID) {
if (in_array($UserID, [2851,69,1718,1716])) {
    $sql = "SELECT top 50
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo, ' - ',(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2
            ,CONCAT(case when PartyID is null then (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') 
	  	 when PartyID is not null then 'Party-Name' end, '-',	
			case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE sndInstitutions.InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
            ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlansEntry' and sndStatus.Status = sndVisitPlans.VEStatus) as VEStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    where
			VEStatus = 1
    order by VisitPlanID desc";
    $stmt = sqlsrv_query($conn, $sql);

} else {

   $sql = "SELECT top 50
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
            ,CONCAT(VisitPlanNo, ' - ',(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status)) as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID)) as VPInfo2
            ,CONCAT(case when PartyID is null then (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') 
	  	 when PartyID is not null then 'Party-Name' end, '-',	
			case when PartyID is null then (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
	  	 when PartyID is not null then (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndVisitPlans.PartyID) end) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstitutionTypeName
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE sndInstitutions.InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    where
         ( 
			VEStatus IN (1) and
            Status = 2 
			and (sndVisitPlans.UserID =?))
     order by VisitPlanID desc";

/*
    	    ( 
			VEStatus IN (1) and
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
            AND Status = 2 
			and (sndVisitPlans.UserID =?) 

		OR	VEStatus IN (1) and
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
            AND Status = 2 
			and (sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID = ?)) ) 
        OR   VEStatus IN (1) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
            AND Status = 2 
			and sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?)) )

		OR   VEStatus IN (1) and (
            (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) 
            IN (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndVisitPlansEntry' AND AppStatus = sndVisitPlans.EStatus) 
            AND Status = 2 
			and sndVisitPlans.UserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID in (select userid from sndUsers where ReportingToUserID = ?))
			
			)
        )
    
    order by VisitPlanID desc";
*/
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);
    
}

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

function get_VisitPlanCompleteRejectCancelled($conn, $UserID) {
    $sql = "SELECT 
			VisitPlanID
			,VisitPlanNo as VisitPlanInfo1
			,convert(char(11),VisitPlanDate,120) as VisitPlanInfo2
			,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VisitPlanInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE sndInstitutions.InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    WHERE UserID = ? and Status in (2,3) order by VisitPlanID desc";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

   

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

function get_VisitPlanComplete($conn, $UserID) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
			,VisitPlanNo as VisitPlanInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VisitPlanInfo2
            ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VisitPlanInfo3
,VisitPlanNo as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VPInfo2
            ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VPInfo3
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE sndInstitutions.InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    WHERE UserID = ? and Status in (2) order by VisitPlanID desc";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

   

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

function get_VisitPlanCancelled($conn, $UserID) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, 
			VisitPlanID
			,VisitPlanNo as VisitPlanInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VisitPlanInfo2
            ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VisitPlanInfo3
			 
			 
			 ,VisitPlanNo as VPInfo1
            ,CONCAT(convert(char(10),VisitPlanDate,105),' - ', (SELECT CategoryName 
            FROM sndCategorydata 
            WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
              AND CategoryType = 'institution-type')) as VPInfo2
            ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID) as VPInfo3
            
		    ,VisitPlanNo
           ,convert(char(11),VisitPlanDate,120) as VisitPlanDate
           ,InstitutionTypeID
		     ,(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
               AND CategoryType = 'institution-type') AS InstituteType
		   ,(SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE sndInstitutions.InstitutionID = sndVisitPlans.InstitutionID) AS InstituteName
           ,InstitutionID
           ,PurposeID
		   ,(select CategoryName from sndCategorydata where CategoryType = 'visitpurpose' and id = PurposeID) as PurposeName
		   ,VisitUserID
		   ,(select empname from sndusers where sndusers.userID = VisitUserID) as VisitUserName
           ,(select Statusmeans from sndStatus where StatusTables = 'sndVisitPlans' and sndStatus.Status = sndVisitPlans.Status) as Status
           ,AppStatus
           ,UserID
		   ,(select empname from sndusers where sndusers.userID = sndVisitPlans.UserID) as LogUserName
           ,convert(char(19),CreatedAt,120) as CreatedAt 
           ,convert(char(19),ModifiedAt,120) as ModifiedAt 
	FROM sndVisitPlans 
    WHERE UserID = ? and Status in (3) order by VisitPlanID desc";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

   

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
    // Query to fetch visit plan details
    $sql = "
SELECT 
    VisitPlanID,
    VisitPlanNo AS VPInfo1,
    CONVERT(CHAR(11), VisitPlanDate, 120) AS VPInfo2,
    
    -- Fetch Institution Name
    case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end AS VPInfo3,
    
    VisitPlanNo,
    CONVERT(CHAR(11), VisitPlanDate, 120) AS VisitPlanDate,
    InstitutionTypeID,
    
    -- Fetch Institution Type Name
    (SELECT TOP 1 CategoryName 
     FROM sndCategorydata 
     WHERE sndCategorydata.id = sndVisitPlans.InstitutionTypeID 
       AND CategoryType = 'institution-type') AS InstitutionTypeName,

    -- Fetch Institute Name

    case when InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndVisitPlans.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndVisitPlans.InstitutionID)
             end AS InstituteName,
    
    InstitutionID,
    PurposeID,

    -- Fetch Purpose Name
    (SELECT TOP 1 CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' 
       AND id = PurposeID) AS PurposeName,

    VisitUserID,

    -- Fetch Visit User Name
    (SELECT TOP 1 empname 
     FROM sndusers 
     WHERE sndusers.userID = VisitUserID) AS VisitUserName,

    Status,
    AppStatus,
    UserID,

    -- Fetch Log User Name
    (SELECT TOP 1 empname 
     FROM sndusers 
     WHERE sndusers.userID = sndVisitPlans.UserID) AS LogUserName,

    -- Fetch Designation
    (SELECT TOP 1 Designation 
     FROM sndUserView 
     WHERE sndUserView.UserID = sndVisitPlans.UserID) AS Designation,

    -- Concatenating multiple rows into a single string using STUFF() + FOR XML PATH
    (SELECT TOP 1 Address 
     FROM sndUserView 
     WHERE sndUserView.UserID = sndVisitPlans.UserID) AS Location,
    
    (SELECT STUFF(
        (SELECT ' | ' + CONCAT(DistrictName, ', ', ThanaName)
         FROM sndMapEmpRegion 
         WHERE UserID = sndVisitPlans.UserID 
         FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'), 1, 3, ''
    )) AS Location1,
     ContactName,
    ContactNumber,
    CONVERT(CHAR(19), CreatedAt, 120) AS CreatedAt,
    CONVERT(CHAR(19), ModifiedAt, 120) AS ModifiedAt 

FROM 
    sndVisitPlans
WHERE 
    VisitPlanID = ?;
    ";

    // Query to fetch approval details
    $sqlApprovals = "
        SELECT
            MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
            MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
            MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.AppComments, '') END) AS AppComments,

            MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
            MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
            MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
        FROM 
            sndApprovalDetails d
        INNER JOIN 
            sndUserView u ON d.UserID = u.UserID
        WHERE 
            d.ApprovalType = 'sndVisitPlans' 
            AND d.ApprovalTypeID = ?
    ";

    // Execute the main visit plan query
    $params = [$VisitPlanID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $visitPlan = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if (!$visitPlan) {
        echo json_encode(["error" => "Visit plan not found"]);
        return;
    }

    // Execute the approval details query
    $stmtApprovals = sqlsrv_query($conn, $sqlApprovals, $params);

    if ($stmtApprovals === false) {
        echo json_encode(["error" => "Error fetching approvals: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $approvalDetails = sqlsrv_fetch_array($stmtApprovals, SQLSRV_FETCH_ASSOC);

$visitPlanBDE = null; 
  // Check PurposeID
  $PurposeID = $visitPlan['PurposeID'];

     if ($PurposeID == '79') {
         // Step 2: Fetch additional details if PurposeID == '24'
         $InstitutionID = $visitPlan['InstitutionID'];
         $VisitUserID = $visitPlan['VisitUserID'];

         $sql1 = "
             SELECT 
                 sndBDExpReq.BDExpReqID,
                 sndBDExpReqDetails.TeacherName as BDInfo1,
                   sndBDExpReqDetails.ContactPhone as BDInfo2,
                  (SELECT ProductName 
                  FROM sndProducts 
                  WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID) as BDInfo3,
                    sndBDExpReqDetails.DonationAmount as BDInfo4,
                 sndBDExpReqDetails.BDExpReqDetailsID,
                 sndBDExpReq.BDExpUserID,
                 CONVERT(CHAR(11), sndBDExpReq.BDExpReqDate, 120) AS BDExpReqDate,
                 sndBDExpReq.InstitutionTypeID,
                 sndCategorydata.id AS InstitutionTypeID,
                 sndCategorydata.CategoryName AS InstitutionTypeName,
                 sndBDExpReq.InstitutionID,
                 sndInstitutions.InstitutionName,
                 sndBDExpReqDetails.TeacherName,
                 sndBDExpReqDetails.Designation,
                 sndBDExpReqDetails.ContactPhone,
                 sndBDExpReqDetails.FinancialYearID,
                 sndBDExpReqDetails.BooksGroupID,
                 (SELECT CategoryName 
                  FROM sndCategorydata 
                  WHERE CategoryType = 'books-category' 
                    AND sndCategorydata.id = sndBDExpReqDetails.BooksGroupID) AS BooksGroup,
                 sndBDExpReqDetails.ProductID,
                 (SELECT ProductName 
                  FROM sndProducts 
                  WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID) AS ProductName,
                 sndBDExpReqDetails.StudentsCount,
                 sndBDExpReqDetails.DonationAmount,
                 sndBDExpReqDetails.DonationDisbrush,
                 sndBDExpReqDetails.DonationAmount - sndBDExpReqDetails.DonationDisbrush AS DonationBalance
             FROM 
                 sndBDExpReq
             INNER JOIN 
                 sndBDExpReqDetails ON sndBDExpReq.BDExpReqID = sndBDExpReqDetails.BDExpReqID
             INNER JOIN 
                 sndCategorydata ON sndBDExpReq.InstitutionTypeID = sndCategorydata.id
             INNER JOIN 
                 sndInstitutions ON sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID 
             WHERE 
                 sndBDExpReq.InstitutionID = ? 
                 AND sndBDExpReq.BDExpUserID = ?";
         $params1 = [$InstitutionID, $VisitUserID];
         $stmt1 = sqlsrv_query($conn, $sql1, $params1);

         if ($stmt1 === false) {
             echo json_encode(["error" => "Error fetching visit plan details: " . print_r(sqlsrv_errors(), true)]);
             return;
         }

         $visitPlanDetails = [];
         while ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
             $visitPlanDetails[] = $row;
         }

         // Merge visit plan and additional details
         $visitPlanBDE['Details'] = $visitPlanDetails;
     }

   //  echo json_encode($visitPlanBDE);
    
    // Combine visit plan and approval details
    $result = [
        "VisitPlan" => $visitPlan,
        "Approvals" => $approvalDetails,
        "visitPlanBDE" => $visitPlanBDE
    ];

    // Return JSON response
    echo json_encode($result);



    
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

function create_visit_entryall($conn, $VisitPlanID) {
    try {
        // Decode JSON input
        $input = json_decode(file_get_contents("php://input"), true);

        // Validate mandatory fields for update_visit_entry
        if (!isset($input['CheckInTime'], $input['CheckOutTime'], $input['VEStatus'])) {
            throw new Exception("Missing required fields for visit plan update");
        }

        // Update visit plan
        $updateSql = "UPDATE sndVisitPlans SET 
                        CheckInTime = ?, 
                        CheckOutTime = ?, 
                        Latitude = ?, 
                        Longitude = ?, 
                        VisitEntryDate = ?, 
                        VEStatus = ?, 
                        ModifiedAt = GETDATE() 
                    WHERE VisitPlanID = ?";
        $updateParams = [
            $input['CheckInTime'],
            $input['CheckOutTime'],
            $input['Latitude'] ?? null,
            $input['Longitude'] ?? null,
            $input['VisitEntryDate'] ?? null,
            $input['VEStatus'],
            $VisitPlanID
        ];

        $updateStmt = sqlsrv_query($conn, $updateSql, $updateParams);
        if ($updateStmt === false) {
            throw new Exception("Error updating visit plan: " . print_r(sqlsrv_errors(), true));
        }

        // Insert visit plan details if provided
        if (isset($input['Details']) && is_array($input['Details'])) {
            foreach ($input['Details'] as $detail) {
                if (!isset($detail['TeacherName'], $detail['Designation'], $detail['Phone'], $detail['ProductID'], $detail['StudentNo'])) {
                    throw new Exception("Missing required fields for visit plan details");
                }

                $detailsSql = "INSERT INTO dbo.sndVisitPlanDetails
                               (VisitPlanID, TeacherName, Designation, Phone, 
                                FinancialYearID, ProductCategoryID, ProductID, 
                                StudentNo, DonationAmount, SpecimenQty, CreatedAt)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";

                $detailsParams = [
                    $VisitPlanID,
                    $detail['TeacherName'],
                    $detail['Designation'],
                    $detail['Phone'],
                    $detail['FinancialYearID'] ?? null,
                    $detail['ProductCategoryID'] ?? null,
                    $detail['ProductID'],
                    $detail['StudentNo'],
                    $detail['DonationAmount'] ?? null,
                    $detail['SpecimenQty'] ?? null
                ];

                $detailsStmt = sqlsrv_query($conn, $detailsSql, $detailsParams);
                if ($detailsStmt === false) {
                    throw new Exception("Error inserting visit plan details: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Insert TADA details if provided
        if (isset($input['TADADetails']) && is_array($input['TADADetails'])) {
            foreach ($input['TADADetails'] as $tadaDetail) {
                if (!isset($tadaDetail['TADACategoryID'], $tadaDetail['Amount'])) {
                    throw new Exception("Missing required fields for TADA details");
                }

                $tadaSql = "INSERT INTO dbo.sndVisitPlanTADADetails
                            (VisitPlanID, TADACategoryID,ThansportMediaID, Amount, CreatedAt)
                            VALUES (?, ?,?, ?, GETDATE())";

                $tadaParams = [
                    $VisitPlanID,
                    $tadaDetail['TADACategoryID'],
					$tadaDetail['ThansportMediaID'],
                    $tadaDetail['Amount']
                ];

                $tadaStmt = sqlsrv_query($conn, $tadaSql, $tadaParams);
                if ($tadaStmt === false) {
                    throw new Exception("Error inserting TADA details: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Success response
        echo json_encode(["message" => "Visit entry, details, and TADA details created/updated successfully"]);
    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode(["error" => $e->getMessage()]);
    }
}


// Function to create a new visit plan
function create_visit_plan($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (
        !isset($input['VisitPlanNo']) || 
        !isset($input['VisitPlanDate']) || 
        !isset($input['InstitutionID']) || 
        !isset($input['InstitutionTypeID']) || 
        !isset($input['UserID'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Common fields
    $visitPlanNo     = $input['VisitPlanNo'];
    $visitPlanDate   = $input['VisitPlanDate'];
    $institutionType = $input['InstitutionTypeID'];
    $userID          = $input['UserID'];
    $purposeID       = $input['PurposeID'] ?? null;
    $visitUserID     = $input['VisitUserID'] ?? null;
      $ContactName     = $input['ContactName'] ?? null;
        $ContactNumber     = $input['ContactNumber'] ?? null;

    if ($institutionType == 227) {
        // When using PartyID instead of InstitutionID
        $sql = "INSERT INTO sndVisitPlans
            (VisitPlanNo, VisitPlanDate, InstitutionTypeID, PartyID, PurposeID, VisitUserID, UserID,  ContactName, ContactNumber,CreatedAt)
            VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, GETDATE())";

        $params = [
            $visitPlanNo,
            $visitPlanDate,
            $institutionType,
            $input['InstitutionID'],
            $purposeID,
            $visitUserID,
            $userID,
            $ContactName,
            $ContactNumber
        ];
    } else {
        // When using InstitutionID
        $sql = "INSERT INTO sndVisitPlans
            (VisitPlanNo, VisitPlanDate, InstitutionTypeID, InstitutionID, PurposeID, VisitUserID, UserID,  ContactName, ContactNumber, CreatedAt)
            VALUES (?, ?, ?, ?, ?, ?, ?,?,?, GETDATE())";

        $params = [
            $visitPlanNo,
            $visitPlanDate,
            $institutionType,
            $input['InstitutionID'], // Same input key used, maps to PartyID in DB
            $purposeID,
            $visitUserID,
            $userID,
            $ContactName,
            $ContactNumber
        ];
    }

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            "error" => "Error creating visit plan", 
            "details" => sqlsrv_errors()
        ]);
        return;
    }

    echo json_encode(["message" => "Visit plan created successfully"]);
}


function update_visit_entry($conn, $VisitPlanID) {
    header('Content-Type: application/json');

    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    $requiredFields = ['CheckInTime', 'CheckOutTime', 'VEStatus'];
    foreach ($requiredFields as $field) {
        if (!isset($input[$field]) || $input[$field] === null || trim($input[$field]) === '') {
            echo json_encode(["error" => "$field is required and cannot be null or empty."]);
            return;
        }
    }

    // Validate CheckOutTime > CheckInTime
    $checkInTime = strtotime($input['CheckInTime']);
    $checkOutTime = strtotime($input['CheckOutTime']);
    if ($checkInTime === false || $checkOutTime === false) {
        echo json_encode(["error" => "Invalid date/time format for CheckInTime or CheckOutTime."]);
        return;
    }

    if ($checkOutTime <= $checkInTime) {
        echo json_encode(["error" => "CheckOutTime must be greater than CheckInTime."]);
        return;
    }

    // Check if a record exists in sndVisitPlanDetails for this VisitPlanID
    $checkEmailSql = "SELECT COUNT(1) AS EmailCount FROM sndVisitPlanDetails WHERE VisitPlanID = ?";
    $checkParams = [$VisitPlanID];
    $checkStmt = sqlsrv_query($conn, $checkEmailSql, $checkParams);

    if ($checkStmt === false) {
        echo json_encode(["error" => "Error checking VisitPlanDetails: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);
    if ($row['EmailCount'] < 1) {
        echo json_encode(["error" => "No related VisitPlanDetails found. Update not allowed."]);
        return;
    }

    // Prepare update SQL
    $sql = "UPDATE sndVisitPlans SET 
        CheckInTime = ?, 
        CheckOutTime = ?, 
        Latitude = ?, 
        Longitude = ?, 
        VisitEntryDate = ?, 
        VEStatus = ?, 
        ModifiedAt = GETDATE() 
        WHERE VisitPlanID = ?";

    $params = [
        $input['CheckInTime'],
        $input['CheckOutTime'],
        $input['Latitude'] ?? null,
        $input['Longitude'] ?? null,
        $input['VisitEntryDate'] ?? null,
        $input['VEStatus'],
        $VisitPlanID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan", "details" => sqlsrv_errors()]);
        return;
    }

    if (sqlsrv_rows_affected($stmt) === 0) {
        echo json_encode(["message" => "No changes made or invalid VisitPlanID"]);
        return;
    }

    echo json_encode([
        "message" => "Visit plan updated successfully",
        "VisitPlanID" => $VisitPlanID
    ]);
}


function update_visit_entry11($conn, $VisitPlanID) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (!isset($input['CheckInTime'], $input['CheckOutTime'], $input['VEStatus'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }


// Check for duplicate email
if (!empty($input['Email'])) {
    $checkEmailSql = "SELECT COUNT(1) AS EmailCount FROM sndVisitPlanDetails WHERE VisitPlanID = ?";
    $checkParams = [$input['Email'], $UserID];
    $checkStmt = sqlsrv_query($conn, $checkEmailSql, $checkParams);

    if ($checkStmt === false) {
        echo json_encode(["error" => "Error checking email: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);
    if ($row['EmailCount'] > 0) {
       
        // Prepare SQL query
        $sql = "UPDATE sndVisitPlans SET 
        CheckInTime = ?, 
        CheckOutTime = ?, 
        Latitude = ?, 
        Longitude = ?, 
        VisitEntryDate = ?, 
        VEStatus = ?, 
        ModifiedAt = GETDATE() 
        WHERE VisitPlanID = ?";

        // Prepare parameters with null-coalescing operator for optional fields
        $params = [
        $input['CheckInTime'],
        $input['CheckOutTime'],
        $input['Latitude'] ?? null,
        $input['Longitude'] ?? null,
        $input['VisitEntryDate'] ?? null,
        $input['VEStatus'],
        $VisitPlanID
        ];

        // Execute query
        $stmt = sqlsrv_query($conn, $sql, $params);

        // Handle query execution result
        if ($stmt === false) {
        echo json_encode(["error" => "Error updating visit plan", "details" => sqlsrv_errors()]);
        return;
        }

    // Success response
    echo json_encode(["message" => "Visit plan updated successfully"]);

    }
}
    
    

}


function get_visit_planDetails($conn, $VisitPlanID) {
    try {
        // Step 1: Fetch basic visit plan details
        $sql = "
SELECT 
    svp.VisitPlanID,
    svp.VisitPlanNo AS VPInfo1,
    CONVERT(CHAR(11), svp.VisitPlanDate, 120) AS VPInfo2,
    svp.ContactName,
	svp.ContactNumber,
    CASE 
        WHEN svp.PartyID IS NULL THEN 
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
        ELSE 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID)
    END AS VPInfo3,

    svp.VisitPlanNo,
    CONVERT(CHAR(11), svp.VisitPlanDate, 120) AS VisitPlanDate,
    svp.InstitutionTypeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE id = svp.InstitutionTypeID 
       AND CategoryType = 'institution-type') AS InstitutionTypeName,
       
    CASE 
        WHEN svp.PartyID IS NULL THEN 
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = svp.InstitutionID)
        ELSE 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = svp.PartyID)
    END AS InstituteName,

    svp.PartyID,
    svp.InstitutionID,
    svp.PurposeID,
    
    (SELECT CategoryName 
     FROM sndCategorydata 
     WHERE CategoryType = 'visitpurpose' AND id = svp.PurposeID) AS PurposeName,
     
    svp.VisitUserID,
    (SELECT empname FROM sndusers WHERE userID = svp.VisitUserID) AS VisitUserName,
    svp.Status,
    svp.AppStatus,
    svp.UserID,
  (SELECT Designation 
     FROM sndUserView 
     WHERE sndUserView.UserID = svp.UserID) AS designation,
    (SELECT empname FROM sndusers WHERE userID = svp.UserID) AS LogUserName,
    
    CONVERT(CHAR(19), svp.CreatedAt, 120) AS CreatedAt,
    CONVERT(CHAR(19), svp.ModifiedAt, 120) AS ModifiedAt,
    
    svp.CheckInTime,
    svp.CheckOutTime,
    svp.Latitude,
    svp.Longitude,
    svp.VisitEntryDate,
    svp.VEStatus,

    CASE 
        WHEN (
            SELECT COUNT(*) 
            FROM sndBDExpReq 
            WHERE 
                InstitutionID = svp.InstitutionID 
                AND BDExpUserID = svp.VisitUserID 
                AND svp.PurposeID = 79
        ) = 0 
        THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus

FROM sndVisitPlans svp
WHERE svp.VisitPlanID = ?;";
        $params = [$VisitPlanID];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            echo json_encode(["error" => "Error fetching visit plan: " . print_r(sqlsrv_errors(), true)]);
            return;
        }

        $visitPlan = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if (!$visitPlan) {
            echo json_encode(["error" => "Visit plan not found"]);
            return;
        }

        // Check PurposeID
        $PurposeID = $visitPlan['PurposeID'];

        if ($PurposeID == '79') {
            // Step 2: Fetch additional details if PurposeID == '24'
            $InstitutionID = $visitPlan['InstitutionID'];
            $VisitUserID = $visitPlan['VisitUserID'];

            $sql1 = "
                SELECT 
                    sndBDExpReq.BDExpReqID,
                    sndBDExpReqDetails.BDExpReqDetailsID,
                    sndBDExpReq.BDExpUserID,
                    CONVERT(CHAR(11), sndBDExpReq.BDExpReqDate, 120) AS BDExpReqDate,
                    sndBDExpReq.InstitutionTypeID,
                    sndCategorydata.id AS InstitutionTypeID,
                    sndCategorydata.CategoryName AS InstitutionTypeName,
                    sndBDExpReq.InstitutionID,
                    sndInstitutions.InstitutionName,
                    sndBDExpReqDetails.TeacherName as VEInfo1,
                    sndBDExpReqDetails.Designation as VEInfo2,
                     sndBDExpReqDetails.ContactPhone as VEInfo3,
                    sndBDExpReqDetails.TeacherName,
                    sndBDExpReqDetails.Designation,
                    sndBDExpReqDetails.ContactPhone,
                    sndBDExpReqDetails.FinancialYearID,
                    (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndBDExpReqDetails.FinancialYearID) as FinancialYear,
                    sndBDExpReqDetails.BooksGroupID,
                    (SELECT CategoryName 
                     FROM sndCategorydata 
                     WHERE CategoryType = 'books-category' 
                       AND sndCategorydata.id = sndBDExpReqDetails.BooksGroupID) AS BooksGroup,
                    sndBDExpReqDetails.ProductID,
                    (SELECT ProductName 
                     FROM sndProducts 
                     WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID) AS ProductName,
                    sndBDExpReqDetails.StudentsCount,
                    sndBDExpReqDetails.DonationAmount,

                    sndBDExpReqDetails.DonationDisbrush,
                    sndBDExpReqDetails.DonationAmount - sndBDExpReqDetails.DonationDisbrush AS DonationBalance
                FROM 
                    sndBDExpReq
                INNER JOIN 
                    sndBDExpReqDetails ON sndBDExpReq.BDExpReqID = sndBDExpReqDetails.BDExpReqID
                INNER JOIN 
                    sndCategorydata ON sndBDExpReq.InstitutionTypeID = sndCategorydata.id
                INNER JOIN 
                    sndInstitutions ON sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID 
                WHERE 
                    sndBDExpReq.InstitutionID = ? 
                    AND sndBDExpReq.BDExpUserID = ?";
            $params1 = [$InstitutionID, $VisitUserID];
            $stmt1 = sqlsrv_query($conn, $sql1, $params1);

            if ($stmt1 === false) {
                echo json_encode(["error" => "Error fetching visit plan details: " . print_r(sqlsrv_errors(), true)]);
                return;
            }

            $visitPlanDetails = [];
            while ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
                $visitPlanDetails[] = $row;
            }

            // Merge visit plan and additional details
            $visitPlan['Details'] = $visitPlanDetails;
        }

        echo json_encode($visitPlan);
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function create_visit_plan_TADA_details_withimage($conn) {
    // Validate database connection
    if ($conn === false) {
        error_log("Invalid database connection");
        echo json_encode(["error" => "Database connection failed"]);
        return;
    }

    // Handle file upload (optional)
    $imagePath = '';
    if (isset($_FILES['BillTicketImagePath']) && $_FILES['BillTicketImagePath']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/bill_ticket_images/";
        $fileExtension = strtolower(pathinfo($_FILES['BillTicketImagePath']['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileMimeType = mime_content_type($_FILES['BillTicketImagePath']['tmp_name']);

        // Validate file type
        if (!in_array($fileExtension, $allowedExtensions) || !in_array($fileMimeType, $allowedMimeTypes)) {
            error_log("Invalid file type: Extension=$fileExtension, MIME=$fileMimeType");
            echo json_encode(["error" => "Only JPG, PNG, and GIF files are allowed"]);
            return;
        }

        // Ensure directory exists and is writable
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                error_log("Failed to create directory: $targetDir");
                echo json_encode(["error" => "Failed to create directory for image upload"]);
                return;
            }
        }
        if (!is_writable($targetDir)) {
            error_log("Directory is not writable: $targetDir");
            echo json_encode(["error" => "Upload directory is not writable"]);
            return;
        }

        // Generate unique file name
        $fileName = uniqid("BillTicket_", true) . "." . $fileExtension;
        $targetFilePath = $targetDir . $fileName;

        // Validate temporary file
        if (!file_exists($_FILES['BillTicketImagePath']['tmp_name']) || !is_readable($_FILES['BillTicketImagePath']['tmp_name'])) {
            error_log("Temporary file not found or not readable: " . $_FILES['BillTicketImagePath']['tmp_name']);
            echo json_encode(["error" => "Invalid temporary file"]);
            return;
        }

        // Move uploaded file
        if (!move_uploaded_file($_FILES['BillTicketImagePath']['tmp_name'], $targetFilePath)) {
            error_log("Failed to move uploaded file to: $targetFilePath");
            echo json_encode(["error" => "Error saving bill ticket image"]);
            return;
        }

        $imagePath = '/uploads/bill_ticket_images/' . $fileName; // Store relative to web root
    } else {
        error_log("No file uploaded or upload error: " . ($_FILES['BillTicketImage']['error'] ?? 'No file'));
    }

    // Get data from form fields
    $visitPlanID = isset($_POST['VisitPlanID']) ? $_POST['VisitPlanID'] : null;
    $tadaCategoryID = isset($_POST['TADACategoryID']) ? $_POST['TADACategoryID'] : null;
    $transportMediaID = isset($_POST['ThansportMediaID']) ? $_POST['ThansportMediaID'] : null;
    $amount = isset($_POST['Amount']) ? $_POST['Amount'] : null;

    // Validate required fields
    if (!$visitPlanID || !$tadaCategoryID || !$amount) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Optional fields
    $remarks = isset($_POST['Remarks']) ? $_POST['Remarks'] : null;
    $taFrom = isset($_POST['TAFrom']) ? $_POST['TAFrom'] : null;
    $taTo = isset($_POST['TATO']) ? $_POST['TATO'] : null;

    // SQL Query
    $sql = "INSERT INTO dbo.sndVisitPlanTADADetails
           (VisitPlanID, TADACategoryID, ThansportMediaID, Amount, CreatedAt, Remarks, TAFrom, TATO, BillTicketImagePath)
           VALUES (?, ?, ?, ?, GETDATE(), ?, ?, ?, ?)";

    // Parameters
    $params = [
        $visitPlanID,
        $tadaCategoryID,
        $transportMediaID,
        $amount,
        $remarks,
        $taFrom,
        $taTo,
        $imagePath
    ];

    // Log parameters for debugging
    error_log("SQL Parameters: " . print_r($params, true));

    // Execute SQL
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        error_log("SQL Error: " . print_r(sqlsrv_errors(), true));
        echo json_encode(["error" => "Error creating TADA details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "TADA details added successfully", "imagePath" => $imagePath]);
}

function create_visit_plan_TADA_details($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check required fields
    if (!isset($input['VisitPlanID']) || !isset($input['TADACategoryID']) || !isset($input['Amount'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Set ThansportMediaID to NULL if not provided
    $thansportMediaID = isset($input['ThansportMediaID']) ? $input['ThansportMediaID'] : null;

    // SQL query
    $sql = "INSERT INTO dbo.sndVisitPlanTADADetails
           (VisitPlanID, TADACategoryID, ThansportMediaID, Amount, CreatedAt)
           VALUES (?, ?, ?, ?, GETDATE())";

    // Parameters for the query
    $params = [
        $input['VisitPlanID'],
        $input['TADACategoryID'],
        $thansportMediaID,
        $input['Amount']
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error creating visit plan TADA details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan TADA details created successfully"]);
}




function get_visit_plan_TADA_details($conn, $VisitPlanID) {
    try {
        // Base URL for images
        $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);

        // Validate VisitPlanID
        if (empty($VisitPlanID)) {
            throw new Exception("VisitPlanID is required");
        }

        // Query to fetch TADA details for the given VisitPlanID
        $sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY vpt.sndVisitPlanTADADetailsID) AS SL,
            vpt.sndVisitPlanTADADetailsID, 
            vpt.TADACategoryID, 
            (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE CategoryType = 'TA/DA Allowance' 
             AND sndCategorydata.id = vpt.TADACategoryID) AS TADACategory,
            vpt.ThansportMediaID,
            tm.ThansportMedia,
            vpt.Amount, 
            vpt.CreatedAt,
            vpt.Remarks,
            vpt.TAFrom,
            vpt.TATO,
            vpt.BillTicketImagePath
        FROM dbo.sndVisitPlanTADADetails vpt
        LEFT JOIN sndThansportMedia tm 
            ON vpt.ThansportMediaID = tm.ThansportMediaID 
        WHERE VisitPlanID = ?";

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, [$VisitPlanID]);

        // Handle query execution failure
        if ($stmt === false) {
            throw new Exception("Error fetching TADA details: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch results into an array
        $tadaDetails = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            // Append the full URL to the image path if it exists
            if (!empty($row['BillTicketImagePath'])) {
                $row['BillTicketImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['BillTicketImagePath'], '/');
            }
            $tadaDetails[] = $row;
        }

        // Check if any records were found
        if (empty($tadaDetails)) {
            echo json_encode(["message" => "No TADA details found for VisitPlanID: $VisitPlanID"]);
            return;
        }

        // Return the TADA details
        echo json_encode([
            "message" => "TADA details fetched successfully",
            "TADADetails" => $tadaDetails
        ]);
    } catch (Exception $e) {
        // Handle exceptions and return an error response
        echo json_encode(["error" => $e->getMessage()]);
    }
}


// Function to create a new visit plan
function create_visit_plan_details($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields
    if (!isset($input['TeacherName']) || !isset($input['Phone'])) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Prepare SQL insert
    $sql = "INSERT INTO dbo.sndVisitPlanDetails
           (VisitPlanID,
            TeacherName,
            Designation,
            Phone,
            FinancialYearID,
            ProductCategoryID,
            ProductID,
            StudentNo,
            DonationAmount,
            SpecimenQty,
            CreatedAt)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";

    // Prepare parameters safely (use null for missing optional fields)
    $params = [
        $input['VisitPlanID'],
        $input['TeacherName'],
        $input['Designation'],
        $input['Phone'],
        $input['FinancialYearID'],
        $input['ProductCategoryID'],
        $input['ProductID'],
        $input['StudentNo'],
        $input['DonationAmount'] ?? null,  // Optional
        $input['SpecimenQty'] ?? null      // Optional
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

    // Check for required fields
    if (
        !isset($input['VisitPlanDate']) || 
        !isset($input['UserID']) || 
        !isset($input['InstitutionID']) || 
        !isset($input['InstitutionTypeID'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Define the InstitutionTypeID
    $institutionType = $input['InstitutionTypeID'];

    // Determine PartyID and InstitutionID values based on type
    if ($institutionType == 227) {
        $institutionID = null;
        $partyID = $input['InstitutionID']; // same input field, but stored as PartyID

    } else {
        $institutionID = $input['InstitutionID'];
        $partyID = null;
       
    }

    $sql = "UPDATE sndVisitPlans SET 
                VisitPlanDate = ?, 
                InstitutionTypeID = ?,
                PartyID = ?, 
                InstitutionID = ?, 
                PurposeID = ?, 
                VisitUserID = ?,
                ContactName =?,
                ContactNumber =?,
                UserID = ?, 
                ModifiedAt = GETDATE() 
            WHERE VisitPlanID = ? and status =1";

    $params = [
        $input['VisitPlanDate'],
        $institutionType,
        $partyID,
        $institutionID,
        $input['PurposeID'] ?? null,
        $input['VisitUserID'] ?? null,
        $input['ContactName'] ?? null,
        $input['ContactNumber'] ?? null,
        $input['UserID'],
        $VisitPlanID
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            "error" => "Error updating visit plan",
            "details" => sqlsrv_errors()
        ]);
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

// Function to delete a visit plan by ID
function delete_VisitPlan_TADADetails($conn, $VisitPlanTADADetailsID) {
    $sql = "DELETE FROM sndVisitPlanTADADetails WHERE sndVisitPlanTADADetailsID = ?";
    $params = [$VisitPlanTADADetailsID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting visit plan: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "Visit plan TA/DA deleted successfully"]);
}


function get_institutionName($conn, $InstitutionTypeID) {
    // SQL query logic based on InstitutionTypeID
    if ($InstitutionTypeID == 227) {
        $sql = "
		select partyid as InstitutionID, 
CONCAT(PartyName,' - ',(select ThanaName from sndRegionView where AreaID = RegionID)) as InstitutionName 
from sndPartyMaster order by PartyName
        ";
        $params = []; // No parameter needed for InstitutionTypeID == 227
		// //   CONCAT(InstitutionName,' - ',(select ThanaName from sndRegionView where AreaID = RegionID)) as InstitutionName 
    } else {
        $sql = "
            SELECT 
                InstitutionID, 
               CONCAT(InstitutionName,' - ',(select ThanaName from sndRegionView where AreaID = RegionID)) as InstitutionName
            FROM 
                sndInstitutions
            WHERE 
                InstitutionTypeID = ? 
            ORDER BY 
                InstitutionName;
        ";
        $params = [$InstitutionTypeID]; // Parameter needed for other cases
    }
// CONCAT(InstitutionName,' - ',(select ThanaName from sndRegionView where AreaID = RegionID)) as InstitutionName 
    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500); // Set HTTP status code for server error
        echo json_encode(["error" => "Error fetching institutions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the array to store institutions
    $institutions = [];

    // Fetch results
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $institutions[] = $row;
    }

    // Return JSON-encoded response
    http_response_code(200); // Set HTTP status code for success
    echo json_encode($institutions);
}

function get_institutionNameUsers($conn, $InstitutionTypeID, $UserID) {
    $sql = "";
    $params = [];

    // Special institution type (227)
    if ($InstitutionTypeID == 227) {
        $sql = "
            SELECT DISTINCT 
                spm.PartyID AS InstitutionID,
                CONCAT(spm.PartyName, ' - ', spm.ThanaName) AS InstitutionName,
                spm.ThanaName,
                spm.DistrictName,
                spm.DivisionName,
                spm.PartyName
            FROM sndPartyArea pm
            JOIN sndpartymaster spm ON spm.PartyID = pm.PartyID
            JOIN sndRegionView rv ON pm.DistrictID = rv.DistrictID 
                                  AND pm.ThanaID = rv.ThanaID 
                                  AND pm.DivisionID = rv.DivisionID 
                                  AND pm.RegionID = rv.AreaID
            WHERE pm.DistrictID IN (
                SELECT mr.DistrictID FROM sndMapEmpRegion mr WHERE mr.UserID = ?
            )
            ORDER BY spm.PartyName;
        ";
        $params = [$UserID];

    // Direct access users
    } else if (in_array($UserID, [2851, 69, 1718, 1716])) {
        $sql = "
            SELECT 
                InstitutionID, 
                CONCAT(InstitutionName, ' - ', 
                       ISNULL((SELECT ThanaName FROM sndRegionView WHERE AreaID = RegionID), 'Unknown')
                ) AS InstitutionName
            FROM sndInstitutions
            WHERE InstitutionTypeID = ?
            ORDER BY InstitutionName;
        ";
        $params = [$InstitutionTypeID];

    // Area Officer Level (1-step reporting)
    } else if (in_array($UserID, [237, 241, 257, 299, 340, 342, 355, 366, 496, 393, 405, 430, 633])) {
        $sql = "
            SELECT 
                InstitutionID, InstitutionTypeID,
                CONCAT(InstitutionName, ' - ', 
                       ISNULL((SELECT ThanaName FROM sndRegionView WHERE AreaID = RegionID), 'Unknown')
                ) AS InstitutionName
            FROM sndInstitutions
            WHERE InstitutionTypeID = ? 
              AND UserID IN (
                  SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?
              )
                or 
				  InstitutionTypeID = ? AND UserID IN (?)
            ORDER BY InstitutionName;
        ";
        $params = [$InstitutionTypeID, $UserID, $InstitutionTypeID, $UserID];

    // RSM Level (2-step reporting)
    } else if (in_array($UserID, [258, 298, 344, 345, 354, 472, 716])) {
        $sql = "
            SELECT 
                InstitutionID, InstitutionTypeID,
                CONCAT(InstitutionName, ' - ', 
                       ISNULL((SELECT ThanaName FROM sndRegionView WHERE AreaID = RegionID), 'Unknown')
                ) AS InstitutionName
            FROM sndInstitutions
            WHERE InstitutionTypeID = ? 
              AND UserID IN (
                  SELECT UserID FROM sndUsers 
                  WHERE ReportingToUserID IN (
                      SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?
                  )
              )
                   or 
				  InstitutionTypeID = ? AND UserID IN (?)
            ORDER BY InstitutionName;
        ";
        $params = [$InstitutionTypeID, $UserID,$InstitutionTypeID, $UserID];

    // Default: institutions mapped to this user directly
    } else {
        $sql = "
            SELECT 
                InstitutionID, 
                CONCAT(InstitutionName, ' - ', 
                       ISNULL((SELECT ThanaName FROM sndRegionView WHERE AreaID = RegionID), 'Unknown')
                ) AS InstitutionName
            FROM sndInstitutions
            WHERE InstitutionTypeID = ? 
              AND UserID = ?
            ORDER BY InstitutionName;
        ";
        $params = [$InstitutionTypeID, $UserID];
    }

    // Execute SQL
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        http_response_code(500);
        echo json_encode(["error" => "Error fetching institutions", "details" => sqlsrv_errors()]);
        return;
    }

    $institutions = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $institutions[] = $row;
    }

    http_response_code(200);
    echo json_encode($institutions);
}



function get_institutionTeacher($conn, $InstitutionID) {
    $sql = "SELECT InstitutionDetailsID, TeacherName, Designation, ContactPhone 
            FROM sndInstitutionDetails 
            WHERE InstitutionID = ?";
    $params = [$InstitutionID];

    // Execute the first query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500);
        echo json_encode(["error" => "Error fetching data: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $TeacherInfo = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $TeacherInfo[] = $row;
    }



    // Return the result
    if (empty($TeacherInfo)) {
        http_response_code(404);
        echo json_encode(["message" => "No data found for the given InstitutionID."]);
    } else {
        http_response_code(200);
        echo json_encode($TeacherInfo);
    }
}


function get_PartyContact($conn, $PartyID) {

        $sql = "SELECT PartyID, ContactPersonName, 
                       ContactNumber 
                FROM sndPartyMaster 
                WHERE partyid = ?";
        $params = [$PartyID];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            http_response_code(500);
            echo json_encode(["error" => "Error fetching fallback data: " . print_r(sqlsrv_errors(), true)]);
            return;
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $TeacherInfo[] = $row;
        }
    

    // Return the result
    if (empty($TeacherInfo)) {
        http_response_code(404);
        echo json_encode(["message" => "No data found for the given InstitutionID."]);
    } else {
        http_response_code(200);
        echo json_encode($TeacherInfo);
    }
}

function get_visit_plan_TeacherBooks($conn, $VisitPlanID) {
    // Validate input
    if (empty($VisitPlanID)) {
        echo json_encode(["error" => "VisitPlanID is required"]);
        return;
    }

    // SQL query to retrieve visit plan details
    $sql = "SELECT 
                 ROW_NUMBER() OVER (ORDER BY VisitPlanID) AS SL, ,
                VisitPlanID,
                TeacherName,
                Designation,
                Phone,
                FinancialYearID,
                ProductCategoryID,
                ProductID,
                StudentNo,
                DonationAmount,
                SpecimenQty,
                CreatedAt
            FROM dbo.sndVisitPlanDetails
            WHERE VisitPlanID = ?";

    // Execute the query
    $params = [$VisitPlanID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle errors
    if ($stmt === false) {
        echo json_encode(["error" => "Error retrieving visit plan details", "details" => sqlsrv_errors()]);
        return;
    }

    // Fetch all results
    $details = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $details[] = $row;
    }

    // Check if details are found
    if (empty($details)) {
        echo json_encode(["error" => "No visit plan details found for the given VisitPlanID"]);
        return;
    }

    // Success response
    echo json_encode(["message" => "Visit plan details retrieved successfully", "data" => $details]);
}

function get_visit_plan_Teacher_TADA($conn, $VisitPlanID) {
    try {
        if (empty($VisitPlanID)) {
            throw new Exception("VisitPlanID is required");
        }

        $response = [
            "message" => "Visit plan details retrieved successfully",
            "TeacherBooks" => [],
            "TADADetails" => []
        ];

       $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);

     
        // TeacherBooks Query
        $sqlTeacherBooks = "
            SELECT 
                ROW_NUMBER() OVER (ORDER BY VisitPlanID) as SL,
                VisitPlanID,
                CONCAT(TeacherName, ', ', Designation, ', ', Phone) as VEInfo1,
                CONCAT((SELECT ProductName 
                        FROM sndProducts 
                        WHERE sndProducts.ProductID = sndVisitPlanDetails.ProductID), ', ', StudentNo) as VEInfo2,
                CASE 
                    WHEN DonationAmount > 0 THEN CONCAT('BD_Exp @BDT. ', DonationAmount)
                    WHEN SpecimenQty > 0 THEN CONCAT('Specimen Qty. ', SpecimenQty)
                    ELSE '' 
                END as VEInfo3,
                TeacherName,
                Designation,
                Phone,
                FinancialYearID,
                ProductCategoryID,
                ProductID,
                StudentNo,
                DonationAmount,
                SpecimenQty,
                CreatedAt
            FROM dbo.sndVisitPlanDetails
            WHERE VisitPlanID = ?";
        $stmtTeacherBooks = sqlsrv_query($conn, $sqlTeacherBooks, [$VisitPlanID]);

        if ($stmtTeacherBooks === false) {
            throw new Exception("Error retrieving TeacherBooks details: " . print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmtTeacherBooks, SQLSRV_FETCH_ASSOC)) {
            $response["TeacherBooks"][] = $row;
        }

        // TADA Query
        $sqlTADA = "
            SELECT 
                ROW_NUMBER() OVER (ORDER BY vpt.sndVisitPlanTADADetailsID) AS SL,
                vpt.sndVisitPlanTADADetailsID, 
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE CategoryType = 'TA/DA Allowance' 
                 AND sndCategorydata.id = vpt.TADACategoryID) as VETAInfo1,
                tm.ThansportMedia as VETAInfo2,
                CONCAT(vpt.TAFrom, ' To ', vpt.TATo, ' - ', vpt.Amount) as VETAInfo3,
                vpt.BillTicketImagePath as VETAInfo4,
                vpt.Remarks,
                vpt.TAFrom,
                vpt.TATo,
                vpt.VisitPlanID,
                vpt.TADACategoryID, 
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE CategoryType = 'TA/DA Allowance' 
                 AND sndCategorydata.id = vpt.TADACategoryID) AS TADACategory,
                vpt.ThansportMediaID,
                tm.ThansportMedia,
                vpt.Amount, 
                vpt.CreatedAt
            FROM dbo.sndVisitPlanTADADetails vpt
            LEFT JOIN sndThansportMedia tm 
                ON vpt.ThansportMediaID = tm.ThansportMediaID 
            WHERE vpt.VisitPlanID = ?";
        $stmtTADA = sqlsrv_query($conn, $sqlTADA, [$VisitPlanID]);

        if ($stmtTADA === false) {
            throw new Exception("Error retrieving TADA details: " . print_r(sqlsrv_errors(), true));
        }

        
        while ($row = sqlsrv_fetch_array($stmtTADA, SQLSRV_FETCH_ASSOC)) {
            // Format image path as full URL if available

            
            if (!empty($row['BillTicketImagePath'])) {
                           $row['BillTicketImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['BillTicketImagePath'], '/');
            }

            
            $response["TADADetails"][] = $row;
        }

        if (empty($response["TeacherBooks"]) && empty($response["TADADetails"])) {
            $response["message"] = "No visit plan details found for the given VisitPlanID";
        }

        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}



function get_InstitutionList($conn) {
    try {
        // Retrieve pagination parameters from query
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;
        $offset = ($page - 1) * $limit;

        // Get the total count of records for pagination
        $countSql = "SELECT COUNT(*) AS TotalRecords FROM sndInstitutions";
        $countStmt = sqlsrv_query($conn, $countSql);
        if ($countStmt === false) {
            throw new Exception("Error executing count query: " . print_r(sqlsrv_errors(), true));
        }
        $totalRecords = sqlsrv_fetch_array($countStmt, SQLSRV_FETCH_ASSOC)['TotalRecords'];
        $totalPages = ceil($totalRecords / $limit);

        // Prepare the paginated SQL query
        $sql = "
            SELECT I.UserID,
                (SELECT empname 
                 FROM sndUsers 
                 WHERE sndUsers.UserID = I.UserID) AS UserName,
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE sndCategorydata.id = I.InstitutionTypeID 
                   AND CategoryType = 'institution-type') AS InstitutionTypeName,
                I.InstitutionName, 
                I.TotalStudents, 
                I.ContactPersonName, 
                I.Designation, 
                I.ContactPhone, 
                I.Address, 
                RV.AreaName, 
                RV.ThanaName, 
                RV.DistrictName, 
                RV.DivisionName,
                I.EIINNo,
                I.InstitutionScanImagePath, 
                I.status, 
                CONVERT(CHAR(11), I.CreatedAt, 120) AS CreatedAt, 
                CONVERT(CHAR(11), I.ModifiedAt, 120) AS ModifiedAt,
                CASE 
                    WHEN D.InstitutionDetailsID IS NULL 
                    THEN 'False' 
                    ELSE 'True' 
                END AS DetailsStatus,
                ROW_NUMBER() OVER (PARTITION BY I.InstitutionID ORDER BY D.InstitutionDetailsID) AS SL,
                D.TeacherName, 
                D.Designation AS TeacherDesignation, 
                D.ContactPhone AS TeacherContactPhone, 
                (SELECT CategoryName 
                 FROM sndCategorydata 
                 WHERE CategoryType = 'books-category' 
                   AND sndCategorydata.id = D.sndClassID) AS BooksGroup,
                D.sndSubjectID,
                (SELECT ProductName 
                 FROM sndProducts 
                 WHERE sndProducts.ProductID = D.sndSubjectID) AS BooksName
            FROM 
                sndInstitutions I
            LEFT JOIN 
                sndInstitutionDetails D
            ON 
                I.InstitutionID = D.InstitutionID
            LEFT JOIN 
                sndRegionView RV
            ON 
                I.RegionID = RV.AreaID
            ORDER BY 
                I.UserID, RV.DivisionName, RV.DistrictName, RV.ThanaName, RV.AreaName, SL
            OFFSET ? ROWS FETCH NEXT ? ROWS ONLY;
        ";

        // Execute the query with pagination parameters
        $params = [$offset, $limit];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            throw new Exception("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the results
        $users = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $users[] = $row;
        }

        // Return the paginated data and metadata
        echo json_encode([
            "success" => true,
            "data" => $users,
            "pagination" => [
                "currentPage" => $page,
                "totalPages" => $totalPages,
                "totalRecords" => $totalRecords,
                "recordsPerPage" => $limit
            ]
        ]);

    } catch (Exception $e) {
        // Handle exceptions and return error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}

function get_all_institutions_page($conn, $UserID, $page, $limit) {
    $baseURL = "http://192.168.88.116/ABPolymer/"; // Replace with your actual domain or base URL

    // Validate and sanitize $page and $limit
    $page = (int)$page;
    $limit = (int)$limit;

    if ($page < 1) {
        $page = 1; // Default to page 1 if invalid
    }
    if ($limit < 1) {
        $limit = 20; // Default to 20 rows per page if invalid
    }

    // Calculate the offset for pagination
    $offset = ($page - 1) * $limit;

    // Determine SQL query based on UserID
    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "
            SELECT 
                InstitutionID, 
                InstitutionTypeID, 
                InstitutionName as InstitutionInfo1,
                ContactPersonName as InstitutionInfo2,
                ContactPhone as InstitutionInfo3,
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
                InstitutionID DESC
            OFFSET ? ROWS
            FETCH NEXT ? ROWS ONLY;
        ";
        $params = [$offset, $limit];
    } else if (in_array($UserID, [298, 344, 345, 354, 472, 237, 241, 257, 258, 299, 340, 342, 355, 366, 496, 393, 405, 430])) {
        $sql = "
            SELECT 
                InstitutionID, 
                InstitutionTypeID, 
                InstitutionName as InstitutionInfo1,
                ContactPersonName as InstitutionInfo2,
                ContactPhone as InstitutionInfo3,
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
            WHERE 
                RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE userid = ?)
            ORDER BY 
                InstitutionID DESC
            OFFSET ? ROWS
            FETCH NEXT ? ROWS ONLY;
        ";
        $params = [$UserID, $offset, $limit];
    } else {
        $sql = "
            SELECT 
                InstitutionID, 
                InstitutionTypeID, 
                InstitutionName as InstitutionInfo1,
                ContactPersonName as InstitutionInfo2,
                ContactPhone as InstitutionInfo3,
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
            WHERE 
                userid = ?
            ORDER BY 
                InstitutionID DESC
            OFFSET ? ROWS
            FETCH NEXT ? ROWS ONLY;
        ";
        $params = [$UserID, $offset, $limit];
    }

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500); // Set HTTP status code for server error
        echo json_encode(["error" => "Error fetching institutions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the array to store institutions
    $institutions = [];

    // Fetch results
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Append the full URL to the image path if it exists
        if (!empty($row['InstitutionScanImagePath'])) {
            $row['InstitutionScanImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['InstitutionScanImagePath'], '/');
        }

        // Add the row to the institutions array
        $institutions[] = $row;
    }

    // Return JSON-encoded response
    http_response_code(200); // Set HTTP status code for success
    echo json_encode($institutions);
}

// Function to get all institutions
// Function to get all institutions
function get_all_institutions($conn, $UserID) {
    $baseURL = "http://192.168.88.116/ABPolymer/"; // Replace with your actual domain or base URL

    // Determine SQL query based on UserID
    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "
            SELECT 
                ROW_NUMBER() OVER (ORDER BY InstitutionID) AS SL, 
                InstitutionID, 
                InstitutionTypeID, 
                 InstitutionName as InstitutionInfo1,
     ContactPersonName as InstitutionInfo2,
      ContactPhone as InstitutionInfo3,
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
                (SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndInstitutions.UserID) AS UserName,
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
        $params = [];
    } else if (in_array($UserID, [298,344,345,354,472,  237,241,257,258,299,340,342,355,366,496,393,405,430])) {
        $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY InstitutionID) AS SL, 
            InstitutionID, 
            InstitutionTypeID, 
             InstitutionName as InstitutionInfo1,
 ContactPersonName as InstitutionInfo2,
  ContactPhone as InstitutionInfo3,
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
             (SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndInstitutions.UserID) AS UserName,
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
        WHERE 
            RegionID in (select AreaID from sndMapEmpRegionRegionView where userid = ?)
        ORDER BY 
            InstitutionID DESC;
    ";
    $params = [$UserID];
    
    } else {
        $sql = "
            SELECT 
             ROW_NUMBER() OVER (ORDER BY InstitutionID) AS SL, 
                InstitutionID, 
                InstitutionTypeID, 
                 InstitutionName as InstitutionInfo1,
     ContactPersonName as InstitutionInfo2,
      ContactPhone as InstitutionInfo3,
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
            WHERE 
               userid = ?
            ORDER BY 
                InstitutionID DESC;
        ";
        $params = [$UserID];
    }

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500); // Set HTTP status code for server error
        echo json_encode(["error" => "Error fetching institutions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the array to store institutions
    $institutions = [];

    // Fetch results
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Append the full URL to the image path if it exists
        if (!empty($row['InstitutionScanImagePath'])) {
            $row['InstitutionScanImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['InstitutionScanImagePath'], '/');
        }

        // Add the row to the institutions array
        $institutions[] = $row;
    }

    // Return JSON-encoded response
    http_response_code(200); // Set HTTP status code for success
    echo json_encode($institutions);
}

function get_Notification($conn, $NotificationID) {
    $sql = "select NotificationsID, sndNotificationsID, NotificationTitle ,NotificationStatusMeans, NotificationPage  from sndNotificationsGenerate where NotificationsID = ?";
    $params = [$NotificationID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // Handle query execution error
        echo json_encode(["error" => "Error fetching NotificationID: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the result
    $Notifications = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($Notifications) {
        // If data is found, return it
        echo json_encode($Notifications);
    } else {
        // If no data is found
        echo json_encode(["error" => "NotificationID not found"]);
    }
}

function get_NotificationNo($conn, $UserID) {
    $sql = "select count(*) as No_of_Notificatiion  from sndNotificationsGenerate where NotifiedTo = ?";
    $params = [$UserID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        // Handle query execution error
        echo json_encode(["error" => "Error fetching NotificationID: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Fetch the result
    $Notifications = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($Notifications) {
        // If data is found, return it
        echo json_encode($Notifications);
    } else {
        // If no data is found
        echo json_encode(["error" => "NotificationID not found"]);
    }
}

function get_notifications($conn, $UserID, $sndNotificationsID) {
    $baseURL = "http://192.168.88.116/ABPolymer/"; // Replace with your actual domain or base URL

    // Determine SQL query based on UserID
    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "SELECT NotificationsID, sndNotificationsID, NotificationTitle, NotificationStatusMeans  
                FROM sndNotificationsGenerate 
                WHERE NotificationStatus = 0 AND sndNotificationsID = ?";
        $params = [$sndNotificationsID]; // Include sndNotificationsID
    } else {
        $sql = "SELECT NotificationsID, sndNotificationsID, NotificationTitle, NotificationStatusMeans  
                FROM sndNotificationsGenerate 
                WHERE NotificationStatus = 0 AND NotifiedTo = ? AND sndNotificationsID = ?";
        $params = [$UserID, $sndNotificationsID]; // Include both UserID and sndNotificationsID
    }

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500); // Set HTTP status code for server error
        echo json_encode(["error" => "Error fetching notifications.", "details" => sqlsrv_errors()]);
        return;
    }

    // Initialize the array to store notifications
    $notifications = [];

    // Fetch results
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $notifications[] = $row;
    }

    // Return JSON-encoded response
    http_response_code(200); // Set HTTP status code for success
    echo json_encode($notifications);
}



function get_all_notifications($conn, $UserID) {
    $baseURL = "http://192.168.88.116/ABPolymer/"; // Replace with your actual domain or base URL

    // Determine SQL query based on UserID
    if (in_array($UserID, [2851,69,1718,1716])) {
        $sql = "
            select sndNotificationsID, NotificationTitle, count(NotificationStatusMeans) No_of_Notifications from sndNotificationsGenerate where NotificationStatus =0 
group by sndNotificationsID,NotificationTitle;
        ";
        $params = [];
    } else {
        $sql = "
           select sndNotificationsID, NotificationTitle, count(NotificationStatusMeans) No_of_Notifications from sndNotificationsGenerate where NotificationStatus =0 and NotifiedTo = ?
group by sndNotificationsID,NotificationTitle;
        ";
        $params = [$UserID];
    }

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Handle query execution errors
    if ($stmt === false) {
        http_response_code(500); // Set HTTP status code for server error
        echo json_encode(["error" => "Error fetching institutions: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the array to store institutions
    $institutions = [];

    // Fetch results
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Append the full URL to the image path if it exists
        if (!empty($row['InstitutionScanImagePath'])) {
            $row['InstitutionScanImagePath'] = rtrim($baseURL, '/') . '/' . ltrim($row['InstitutionScanImagePath'], '/');
        }

        // Add the row to the institutions array
        $institutions[] = $row;
    }

    // Return JSON-encoded response
    http_response_code(200); // Set HTTP status code for success
    echo json_encode($institutions);
}


// Function to get a single institution by ID
function get_institution($conn, $institutionID) {
    $sql = "SELECT * ,
    (SELECT EmpName FROM sndUsers WHERE sndUsers.UserID = sndinstitutions.UserID) AS UserName
    FROM sndinstitutions WHERE institutionID = ?";
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
            $baseUrl = "http://192.168.88.116/ABPolymer/"; // Update with your actual base URL
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


    // Disable the trigger
//$disableTriggerSql = "DISABLE TRIGGER [dbo].[trg_sndInstitutions_Region] ON [dbo].[sndInstitutions];";
//sqlsrv_query($conn, $disableTriggerSql);
// Create a temporary table to hold the output
$tempTable = "##TempInstitutionOutput";

$sql = "DECLARE @TempTable TABLE (InstitutionID INT);
        INSERT INTO sndInstitutions (
            InstitutionTypeID, InstitutionName, TotalStudents, ContactPersonName, Designation, 
            ContactPhone, Address, RegionID, EIINNo, UserID, InstitutionScanImagePath, CreatedAt)
        OUTPUT INSERTED.InstitutionID INTO @TempTable
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE());

        SELECT InstitutionID FROM @TempTable;";
    /* SQL query to insert the institution data
    $sql = "INSERT INTO sndInstitutions (
                InstitutionTypeID, InstitutionName, TotalStudents, ContactPersonName, Designation, 
                ContactPhone, Address, RegionID, EIINNo, UserID, InstitutionScanImagePath, CreatedAt)
            OUTPUT INSERTED.InstitutionID
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, GETDATE())";
*/
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
        $_POST['UserID'] ?? null,
        $imagePath
    ];

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

// Re-enable the trigger
//$enableTriggerSql = "ENABLE TRIGGER [dbo].[trg_sndInstitutions_Region] ON [dbo].[sndInstitutions];";
//sqlsrv_query($conn, $enableTriggerSql);

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

// Create a temporary table to hold the output
$tempTable = "##TempInstitutionOutput";

// SQL query to insert the institution data and output the inserted InstitutionID into a temporary table
$sql = "DECLARE @TempTable TABLE (InstitutionID INT);
        INSERT INTO sndInstitutions (
            InstitutionTypeID, InstitutionName, TotalStudents, ContactPersonName, Designation, 
            ContactPhone, Address, RegionID, EIINNo, UserID, InstitutionScanImagePath, CreatedAt)
        OUTPUT INSERTED.InstitutionID INTO @TempTable
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE());

        SELECT InstitutionID FROM @TempTable;";


    /* SQL query to insert the institution data
    $sql = "INSERT INTO sndInstitutions (
                InstitutionTypeID, InstitutionName, TotalStudents, ContactPersonName, Designation, 
                ContactPhone, Address, RegionID, EIINNo, UserID, InstitutionScanImagePath, CreatedAt
            )
            OUTPUT INSERTED.InstitutionID
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, GETDATE())";
*/
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
        $_POST['UserID'] ?? null,
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
    $fullImagePath = $imagePath ? "http://192.168.88.116/ABPolymer/" . $imagePath : null;

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

function delete_pTransferdetails($conn, $ProductTransferDetailsID) {
	
	// Delete details
    $delete_details_sql = "DELETE FROM sndProductTransferdetails WHERE ProductTransferdetailsid = ?";
    sqlsrv_query($conn, $delete_details_sql, [$ProductTransferDetailsID]);

	
    $sql = "DELETE FROM sndProductTransferdetails WHERE ProductTransferdetailsid = ?";
    $params = [$ProductTransferDetailsID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting ProductTransferdetails: " . print_r(sqlsrv_errors(), true)]);
        Transfer;
    }

    echo json_encode(["message" => "ProductTransferdetails deleted successfully"]);
}



function delete_preturndetails($conn, $ProductReturnDetailsID) {
	
	// Delete details
    $delete_details_sql = "DELETE FROM sndProductReturndetails WHERE ProductReturndetailsid = ?";
    sqlsrv_query($conn, $delete_details_sql, [$ProductReturnDetailsID]);

	
    $sql = "DELETE FROM sndProductReturndetails WHERE ProductReturndetailsid = ?";
    $params = [$ProductReturnDetailsID];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error deleting ProductReturndetails: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    echo json_encode(["message" => "ProductReturndetails deleted successfully"]);
}



// Fetch all parties
function get_all_parties($conn) {
    $sql = "SELECT [PartyID] ,[PartyName],[ContactPersonName],[ContactNumber],[Address] ,[CreditLimit],[DepositAmount] ,[OpeningBalance], 
rv.DivisionName
from sndPartyMaster pm, sndRegionView rv 
where pm.RegionID = rv.ThanaID
order by PartyName ";
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

  
    if (in_array($UserID, [2851])) {
        $sql = "select PartyID, PartyName
from sndPartyMaster";
 $partyParams = [$UserID];
 }else {
  $sql = "select PM.PartyID, PartyName
from sndPartyMaster pm, sndRegionView rv 
where pm.DistrictID = rv.DistrictID and pm.ThanaID = rv.ThanaID and pm.DivisionID = rv.DivisionID
and pm.DistrictID in (select mr.DistrictID from sndMapEmpRegion mr where UserID = ?)";
  $partyParams = [$UserID];
  }

 /* 
  $sql = "select PM.PartyID, PartyName
from sndPartyMaster pm, sndRegionView rv 
where pm.DistrictID = rv.DistrictID and pm.ThanaID = rv.ThanaID and pm.DivisionID = rv.DivisionID
and pm.DistrictID in (select mr.DistrictID from sndMapEmpRegion mr where UserID = ?)";
    
	$partyParams = [$UserID];
*/

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
            $baseUrl = "http://192.168.88.116/ABPolymer/uploads/party_files/";
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
        $baseUrl = "http://192.168.88.116/ABPolymer/uploads/party_files/";

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
                            "PartyDocsPath" => "http://192.168.88.116/ABPolymer/uploads/party_files/" . $encodedPartyName . "/" . $fileName
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
        $areaSQL = "SELECT PartyAreaID as RegionID, RegionName FROM sndPartyArea WHERE PartyID = ?";
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


function delete_partydetailsAreas($conn, $PartyAreaID) {
    $sql = "DELETE FROM sndPartyArea WHERE PartyAreaID = ?";
    $params = [$PartyAreaID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo json_encode(["success" => "Party details areas deleted successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting party details areas: " . print_r(sqlsrv_errors(), true)]);
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

function create_mapping($conn) {
    $input = json_decode(file_get_contents("php://input"), true);

    // Check if input is an array
    if (!is_array($input) || empty($input)) {
        echo json_encode(["error" => "Invalid or missing input"]);
        return;
    }

    $errors = [];
    foreach ($input as $item) {
        // Validate each object in the array
        if (!isset($item['UserID']) || !isset($item['RegionID'])) {
            $errors[] = "Missing required fields for one or more items";
            continue;
        }

        // Execute stored procedure
        $sql = "EXEC insertusermap ?, ?";
        $params = [$item['UserID'], $item['RegionID']];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            $errors[] = "Error inserting UserID: {$item['UserID']}, RegionID: {$item['RegionID']}: " . print_r(sqlsrv_errors(), true);
        }
    }

    // Prepare the response
    if (empty($errors)) {
        echo json_encode(["message" => "All mappings created successfully"]);
    } else {
        echo json_encode(["error" => $errors]);
    }
}


// Function to create a new mapping
function create_mapping11($conn) {
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
        order by ThanaName";

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
// function get_all_products($conn) {
//     $sql = "SELECT ProductID
//       ,ProductName
// 	  ,Categoryid
//       ,(select CategoryName from sndCategorydata WHERE CategoryType = 'books-category' and sndCategorydata.id = Categoryid) as Category,status 
// 	  FROM sndProducts order by ProductID";
//     $stmt = sqlsrv_query($conn, $sql);

//     if ($stmt === false) {
//         echo json_encode(["error" => "Error fetching products: " . print_r(sqlsrv_errors(), true)]);
//         return;
//     }

//     $products = [];
//     while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//         $products[] = $row;
//     }

//     echo json_encode($products);
// }

// function get_all_products($conn) {
//     // First try to get books-category products
//     $sql = "SELECT p.ProductID, p.ProductName, p.Categoryid, 
//                    c.CategoryName as Category, p.status 
//             FROM sndProducts p
//             INNER JOIN sndCategorydata c ON p.Categoryid = c.ID
//             WHERE c.CategoryType = 'books-category' 
//             AND c.ID NOT IN (216, 218, 221)
//             ORDER BY p.ProductID";
    
//     $stmt = sqlsrv_query($conn, $sql);

//     if ($stmt === false) {
//         echo json_encode(["error" => "Error fetching products: " . print_r(sqlsrv_errors(), true)]);
//         return;
//     }

//     $products = [];
//     while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//         // Clean the data - convert any objects to strings
//         foreach ($row as $key => $value) {
//             if (is_object($value)) {
//                 $row[$key] = (string)$value;
//             }
//         }
//         $products[] = $row;
//     }

//     // If no books products found, get all products as fallback
//     if (empty($products)) {
//         $fallback_sql = "SELECT p.ProductID, p.ProductName, p.Categoryid, 
//                                 c.CategoryName as Category, p.status 
//                          FROM sndProducts p
//                          INNER JOIN sndCategorydata c ON p.Categoryid = c.ID
//                          WHERE c.ID NOT IN (216, 218, 221)
//                          ORDER BY p.ProductID";
        
//         $fallback_stmt = sqlsrv_query($conn, $fallback_sql);
        
//         if ($fallback_stmt !== false) {
//             while ($row = sqlsrv_fetch_array($fallback_stmt, SQLSRV_FETCH_ASSOC)) {
//                 foreach ($row as $key => $value) {
//                     if (is_object($value)) {
//                         $row[$key] = (string)$value;
//                     }
//                 }
//                 $products[] = $row;
//             }
//         }
//     }

//     echo json_encode($products);
// }

function get_all_products($conn) {
    // First, let's see what categories and products actually exist
    $debug_sql = "SELECT p.ProductID, p.ProductName, p.Categoryid, 
                         c.CategoryName, c.CategoryType
                  FROM sndProducts p
                  INNER JOIN sndCategorydata c ON p.Categoryid = c.ID
                  ORDER BY p.ProductID
                  OFFSET 0 ROWS FETCH NEXT 100 ROWS ONLY";
    
    $debug_stmt = sqlsrv_query($conn, $debug_sql);

    if ($debug_stmt === false) {
        echo json_encode(["error" => "Error: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $all_products = [];
    while ($row = sqlsrv_fetch_array($debug_stmt, SQLSRV_FETCH_ASSOC)) {
        foreach ($row as $key => $value) {
            if (is_object($value)) {
                $row[$key] = (string)$value;
            }
        }
        $all_products[] = $row;
    }

    echo json_encode($all_products);
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
	$sql = "SELECT CAST(AVG(Rate) AS DECIMAL(10,2)) AS Rate FROM sndProductReceiptdetails WHERE FinancialYearID = ? AND ProductID = ?";
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

function get_NumberToWord($conn, $Number) {
    //$sql = "SELECT avg(Rate) as Rate FROM sndProductReceipt WHERE FinancialYearID = ? AND ProductID = ?";
	$sql = "select dbo.fnNumberToWords(?) as Inword";
    $params = [$Number];
    
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product rate: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $rates = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $Inwords[] = $row['Inword'];
    }

    // If only one rate is expected, return it
    if (count($Inwords) === 1) {
        echo json_encode(["Inwords" => $Inwords[0]]);
    } else {
        // If multiple rates exist, return them as an array
        echo json_encode(["Inwords" => $Inwords]);
    }
}


function get_user_statistics_institution_visit($conn, $UserID, $InstitutionTypeID, $date1, $date2) {
    $sql = "
        SELECT ROW_NUMBER() OVER (ORDER BY vp.VisitPlanID) AS SL,
            vp.VisitPlanID,
            vp.VisitPlanNo AS VP1,
            CONVERT(char(10), vp.VisitPlanDate, 120) AS VP2,
            vp.InstitutionTypeID,
            vp.InstitutionID,
            cat.CategoryName AS InstitutionType,
            inst.InstitutionName AS VP3,
            vp.UserID, vpd.TeacherName, vpd.Designation, vpd.Phone
        FROM 
            sndVisitPlans vp
        LEFT JOIN 
            sndCategorydata cat ON vp.InstitutionTypeID = cat.ID AND cat.CategoryType = 'institution-type'
        LEFT JOIN 
            sndInstitutions inst ON vp.InstitutionID = inst.InstitutionID
		 LEFT JOIN 
            sndVisitPlanDetails vpd ON vpd.VisitPlanID = vp.VisitPlanID
        WHERE 
            vp.VEStatus = 1 
            AND vp.PartyID IS NULL
            AND vp.UserID = ?
            AND vp.InstitutionTypeID = ?
            AND vp.VisitPlanDate BETWEEN ? AND ?
    ";

    $params = array($UserID, $InstitutionTypeID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'error' => "SQL error: " . print_r(sqlsrv_errors(), true)
        ]);
        return;
    }

    $result = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
}


function get_user_statistics_party_visit($conn, $UserID, $date1, $date2) {
    $sql = "
        SELECT ROW_NUMBER() OVER (ORDER BY vp.VisitPlanID) AS SL,
            vp.VisitPlanID, 
            vp.VisitPlanNo AS VP1, 
            convert(char(10),vp.VisitPlanDate,120) AS VP2, 
            vp.InstitutionTypeID, 
            vp.PartyID, 
            vp.VisitPlanDate,
            pm.PartyName AS VP3
        FROM 
            sndVisitPlans vp
        LEFT JOIN 
            sndPartyMaster pm ON vp.PartyID = pm.PartyID
        WHERE 
            vp.VEStatus = 1 
            AND vp.InstitutionID IS NULL
            AND vp.UserID = ?
            AND vp.VisitPlanDate BETWEEN ? AND ?
    ";

    $params = array($UserID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'error' => "SQL error: " . print_r(sqlsrv_errors(), true)
        ]);
        return;
    }

    $result = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
}

function get_user_statistics_institution_visit_team($conn, $UserID, $InstitutionTypeID, $date1, $date2) {
    $sql = "
        SELECT ROW_NUMBER() OVER (ORDER BY vp.VisitPlanID) AS SL,
            vp.VisitPlanID,
            vp.VisitPlanNo AS VP1,
            CONVERT(char(10), vp.VisitPlanDate, 120) AS VP2,
            vp.InstitutionTypeID,
            vp.InstitutionID,
            cat.CategoryName AS InstitutionType,
            inst.InstitutionName AS VP3,
            vp.UserID, vpd.TeacherName, vpd.Designation, vpd.Phone
        FROM 
            sndVisitPlans vp
        LEFT JOIN 
            sndCategorydata cat ON vp.InstitutionTypeID = cat.ID AND cat.CategoryType = 'institution-type'
        LEFT JOIN 
            sndInstitutions inst ON vp.InstitutionID = inst.InstitutionID
		 LEFT JOIN 
            sndVisitPlanDetails vpd ON vpd.VisitPlanID = vp.VisitPlanID
        WHERE 
            vp.VEStatus = 1 
            AND vp.PartyID IS NULL
            AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?)
            AND vp.InstitutionTypeID = ?
            AND vp.VisitPlanDate BETWEEN ? AND ?
    ";

    $params = array($UserID, $InstitutionTypeID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'error' => "SQL error: " . print_r(sqlsrv_errors(), true)
        ]);
        return;
    }

    $result = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
}


function get_user_statistics_party_visit_team($conn, $UserID, $date1, $date2) {
    $sql = "
        SELECT ROW_NUMBER() OVER (ORDER BY vp.VisitPlanID) AS SL,
            vp.VisitPlanID, 
            vp.VisitPlanNo AS VP1, 
            convert(char(10),vp.VisitPlanDate,120) AS VP2, 
            vp.InstitutionTypeID, 
            vp.PartyID, 
            vp.VisitPlanDate,
            pm.PartyName AS VP3
        FROM 
            sndVisitPlans vp
        LEFT JOIN 
            sndPartyMaster pm ON vp.PartyID = pm.PartyID
        WHERE 
            vp.VEStatus = 1 
            AND vp.InstitutionID IS NULL
            AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?)
            AND vp.VisitPlanDate BETWEEN ? AND ?
    ";

    $params = array($UserID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'error' => "SQL error: " . print_r(sqlsrv_errors(), true)
        ]);
        return;
    }

    $result = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
}


function get_user_statistics_expense_visit_team($conn, $UserID, $ExpenseID, $date1, $date2) {
    $sql = "
        SELECT ROW_NUMBER() OVER (ORDER BY vp.VisitPlanID) AS SL,
 vp.VisitPlanID,
    vp.VisitPlanNo,
    CONVERT(char(10), vp.VisitPlanDate, 120) AS VisitPlanDate,
    vp.InstitutionTypeID,
    vp.InstitutionID,
    cat.CategoryName AS InstitutionType,
    inst.InstitutionName,
	vp.UserID,
	FORMAT(ISNULL(td.Amount, 0), 'N2')  as Amount, td.TAFrom, td.TATO
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
				 LEFT JOIN 
    sndInstitutions inst ON vp.InstitutionID = inst.InstitutionID
LEFT JOIN 
    sndCategorydata cat ON vp.InstitutionTypeID = cat.ID AND cat.CategoryType = 'institution-type'
                 WHERE vp.UserID in (select userid from sndusers where ReportingToUserID = ?) and td.TADACategoryID = ? 
				 and vp.VisitPlanDate between ? and ?
    ";

    $params = array($UserID, $ExpenseID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'error' => "SQL error: " . print_r(sqlsrv_errors(), true)
        ]);
        return;
    }

    $result = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
}



function get_user_statistics_expense_visit($conn, $UserID, $ExpenseID, $date1, $date2) {
    $sql = "
        SELECT ROW_NUMBER() OVER (ORDER BY vp.VisitPlanID) AS SL,
 vp.VisitPlanID,
    vp.VisitPlanNo,
    CONVERT(char(10), vp.VisitPlanDate, 120) AS VisitPlanDate,
    vp.InstitutionTypeID,
    vp.InstitutionID,
    cat.CategoryName AS InstitutionType,
    inst.InstitutionName,
	vp.UserID,
	FORMAT(ISNULL(td.Amount, 0), 'N2')  as Amount, td.TAFrom, td.TATO
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
				 LEFT JOIN 
    sndInstitutions inst ON vp.InstitutionID = inst.InstitutionID
LEFT JOIN 
    sndCategorydata cat ON vp.InstitutionTypeID = cat.ID AND cat.CategoryType = 'institution-type'
                 WHERE vp.UserID = ? and td.TADACategoryID = ? 
				 and vp.VisitPlanDate between ? and ?
    ";

    $params = array($UserID, $ExpenseID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode([
            'success' => false,
            'error' => "SQL error: " . print_r(sqlsrv_errors(), true)
        ]);
        return;
    }

    $result = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }

    echo json_encode([
        'success' => true,
        'data' => $result
    ]);
}

function get_user_statistics11($conn, $UserID, $date1, $date2) {
    $response = array();

    // Step 1: Get category names
    $categoryMap = array(); // Maps ID to readable name
    $categoryQuery = "SELECT TADACategoryID, CategoryName FROM sndTADACategory";
    $categoryStmt = sqlsrv_query($conn, $categoryQuery);
    if ($categoryStmt === false) {
        $response['error'] = "Failed to retrieve categories.";
        return $response;
    }
    while ($row = sqlsrv_fetch_array($categoryStmt, SQLSRV_FETCH_ASSOC)) {
        $id = $row['TADACategoryID'];
        $name = str_replace(' ', '_', $row['CategoryName']);
        $name = preg_replace('/[^A-Za-z0-9_]/', '', $name); // Sanitize name
        $categoryMap[$id] = $name;
    }

    // Step 2: Query user statistics
    $query = "
        SELECT TADACategoryID, SUM(Amount) AS TotalAmount
        FROM sndTADAExpenses
        WHERE UserID = ? AND VisitDate BETWEEN ? AND ?
        GROUP BY TADACategoryID
    ";
    $params = array($UserID, $date1, $date2);
    $stmt = sqlsrv_query($conn, $query, $params);
    if ($stmt === false) {
        $response['error'] = "Query failed.";
        return $response;
    }

    // Step 3: Build response
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $categoryID = $row['TADACategoryID'];
        $amount = number_format((float)$row['TotalAmount'], 2, '.', '');

        if (isset($categoryMap[$categoryID])) {
            $categoryKey = $categoryMap[$categoryID] . "_Expense";
        } else {
            $categoryKey = "Unknown_Expense_" . $categoryID;
        }

        $response[] = array(
            "TADACategoryID" => $categoryID,
            $categoryKey => $amount
        );
    }

    return $response;
}

function get_user_statistics($conn, $UserID) {
    try {
        $response = [];


              // Example: No_of_Institution
        $sql1 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institution FROM sndInstitutions WHERE 
        RegionID in (select AreaID from sndMapEmpRegionRegionView where userid = ?)";
        $stmt1 = sqlsrv_query($conn, $sql1, [$UserID]);
        $response['No_of_Institution'] = ($stmt1 && ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Institution'] : "0.00";


         // Query 2: Number of Parties
        $sql2 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Party 
                 FROM sndPartyMaster 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID = ?)";
        $stmt2 = sqlsrv_query($conn, $sql2, [$UserID]);
        $response['No_of_Party'] = ($stmt2 && ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Party'] : 0;

        // Query 3: Institution Visits
        $sql3 = "SELECT 
        (SELECT InstitutionTypeID 
                     FROM sndCategorydata 
                     WHERE sndCategorydata.ID = sndVisitPlans.InstitutionTypeID 
                       AND CategoryType = 'institution-type') AS InstitutionTypeID,
                    (SELECT CategoryName 
                     FROM sndCategorydata 
                     WHERE sndCategorydata.ID = sndVisitPlans.InstitutionTypeID 
                       AND CategoryType = 'institution-type') AS InstitutionType, 
                    FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institute_Visit  
                 FROM sndVisitPlans 
                 WHERE VEStatus = 1 AND VisitUserID = ? 
                 GROUP BY InstitutionTypeID";
        $stmt3 = sqlsrv_query($conn, $sql3, [$UserID]);
        $response['Institution_Visits'] = [];
        while ($stmt3 && ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC))) {
            $response['Institution_Visits'][] = $row;
        }

        // Query 4: Sales Target
        $sql4 = "SELECT 
                    FORMAT(ISNULL((SUM(vd.StudentNo) * AVG(prd.Rate)), 0), 'N2') AS Sales_Target
                 FROM sndVisitPlanDetails vd
                 JOIN sndProductReceiptdetails prd 
                    ON vd.FinancialYearID = prd.FinancialYearID 
                    AND vd.ProductID = prd.ProductID
                 JOIN sndVisitPlans vp 
                    ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.VEStatus = 1 AND vp.VisitUserID = ?";
        $stmt4 = sqlsrv_query($conn, $sql4, [$UserID]);
        $response['Sales_Target'] = ($stmt4 && ($row = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Target'] : 0;

        // Query 5: Sales Achievement
        $sql5 = "SELECT FORMAT(ISNULL(SUM(SubTotal), 0), 'N2') AS Sales_Achievement 
                 FROM sndSalesOrderDetails sod
                 JOIN sndSalesOrders so ON sod.SalesOrderID = so.SalesOrderID
                 WHERE so.UserID = ?";
        $stmt5 = sqlsrv_query($conn, $sql5, [$UserID]);
        $response['Sales_Achievement'] = ($stmt5 && ($row = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Achievement'] : 0;

        // Query 6: Total Collection
        $sql6 = "SELECT FORMAT(ISNULL(SUM(AmountReceived), 0), 'N2') AS Total_Collection 
                 FROM sndMoneyReceipt 
                 WHERE ReceivedByUserID = ?";
        $stmt6 = sqlsrv_query($conn, $sql6, [$UserID]);
        $response['Total_Collection'] = ($stmt6 && ($row = sqlsrv_fetch_array($stmt6, SQLSRV_FETCH_ASSOC))) ? $row['Total_Collection'] : 0;


        $sql61 = "SELECT FORMAT(ISNULL(SUM(TotalAmount), 0), 'N2') AS Total_BD_Budget
                 FROM sndBDExpReq 
                 WHERE UserID = ?";
        $stmt61 = sqlsrv_query($conn, $sql61, [$UserID]);
        $response['Total_BD_Budget'] = ($stmt61 && ($row = sqlsrv_fetch_array($stmt61, SQLSRV_FETCH_ASSOC))) ? $row['Total_BD_Budget'] : 0;


           // (Your earlier queries for No_of_Institution, No_of_Party, Institution_Visits, Sales_Target, Sales_Achievement, Total_Collection)
        // ... [keep unchanged, same as before]

  
        // ... similarly for other non-expense queries (No_of_Party, Institution_Visits, Sales_Target, Sales_Achievement, Total_Collection)
        // (Insert all unchanged queries here for completeness)

        // Your non-expense queries here - same as your original function

        // Expense queries
        $expenseQueries = [
            'Business_Development_Expense' => [
                "SELECT  FORMAT(ISNULL(SUM(DonationAmount), 0), 'N2') AS Business_Development_Expense 
                 FROM sndVisitPlanDetails vd
                 JOIN sndVisitPlans vp ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.PurposeID = 79 AND vp.UserID = ?"
            ],
            // ... all other expense queries exactly as before ...
            'Specimen_Expense' => [
                "SELECT (ISNULL(sum(SpecimenQty)*isnull((select avg(Rate) from sndProductReceiptDetails prd where prd.ProductID = vd.ProductID and prd.FinancialYearID = vd.FinancialYearID),0), 0)) AS Specimen_Expense 
                 FROM sndVisitPlanDetails vd
                 JOIN sndVisitPlans vp ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.PurposeID = 124 AND vp.UserID = ?
                 GROUP BY vd.ProductID, vd.FinancialYearID"
            ],
            'TA_Expense' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS TA_Expense 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE  td.TADACategoryID = 21 AND vp.UserID = ? GROUP BY td.TADACategoryID"
            ],
            // ... continue with all the others ...
            'DA_Expense' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS DA_Expense 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 22 AND vp.UserID = ? GROUP BY td.TADACategoryID"
            ],
            'Teacher_Entertainment' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Teacher_Entertainment 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 23 AND vp.UserID = ? GROUP BY td.TADACategoryID"
            ],
            // ... rest of your expense queries ...
         'Business_Development_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Business_Development_Exp 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 24 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Fuel_Lubricant_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Fuel_Lubricant_Exp
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 25 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Hotel_Rent' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Hotel_Rent 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 26 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Transport_Courier' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Transport_Courier 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 200 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Photocopy_Bill' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Photocopy_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 201 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Administrative_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Administrative_Exp
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 202 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Gift_Tips_Party' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Gift_Tips_Party 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 109 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Bank_Online_Charge' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Bank_Online_Charge  
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 203 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Others_Bill' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Others_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 204 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Mobile_Bill' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Mobile_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 139 AND vp.UserID = ?  group by td.TADACategoryID"
            ],
             'Bike' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Bike 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 206 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Text_RefetchData' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Text_RefetchData 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 183 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Repair_and_Maintenance' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Repair_and_Maintenance 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 77 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Specimen_Requisition' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Specimen_Requisition 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 84 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Specimen_Distribution' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Specimen_Distribution 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 123 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Miscellaneous_Expenses' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Miscellaneous_Expenses 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 145 AND vp.UserID = ? group by td.TADACategoryID"
            ],
        ];

        $expenseList = [];

        foreach ($expenseQueries as $key => $query) {
            $stmt = sqlsrv_query($conn, $query[0], [$UserID]);
            if ($stmt && ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
                if (isset($row['TADACategoryID'])) {
                    $expenseList[] = [
                        'Name' => $key,
                        'TADACategoryID' => intval($row['TADACategoryID']),
                        $key => $row[$key]
                    ];
                } else {
                    $expenseList[] = [
                        'Name' => $key,
                        'TADACategoryID' => null,
                        $key => $row[$key]
                    ];
                }
            } else {
                $expenseList[] = [
                    'Name' => $key,
                    'TADACategoryID' => null,
                    $key => "0.00"
                ];
            }
        }

        $response['Expense'] = $expenseList;

        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function get_user_statistics_date($conn, $UserID, $date1, $date2) {
    try {
        $response = [];

        // 1. No of Institutions
        $sql1 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institution 
                 FROM sndInstitutions 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID = ?)";
        $stmt1 = sqlsrv_query($conn, $sql1, [$UserID]);
        $response['No_of_Institution'] = ($stmt1 && ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Institution'] : "0.00";

        // 2. No of Parties
        $sql2 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Party 
                 FROM sndPartyMaster 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID = ?)";
        $stmt2 = sqlsrv_query($conn, $sql2, [$UserID]);
        $response['No_of_Party'] = ($stmt2 && ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Party'] : "0.00";

        // 3. Institution Visits (fixed logic with JOIN instead of subqueries)
        $sql3 = "SELECT 
                    v.InstitutionTypeID,
                    c.CategoryName AS InstitutionType,
                    FORMAT(COUNT(*), 'N2') AS No_of_Institute_Visit  
                 FROM sndVisitPlans v
                 LEFT JOIN sndCategorydata c 
                    ON v.InstitutionTypeID = c.ID AND c.CategoryType = 'institution-type'
                 WHERE v.VEStatus = 1 
                   AND v.VisitUserID = ? 
                   AND v.VisitPlanDate BETWEEN ? AND ?
                 GROUP BY v.InstitutionTypeID, c.CategoryName";
        $stmt3 = sqlsrv_query($conn, $sql3, [$UserID, $date1, $date2]);
        $response['Institution_Visits'] = [];
        while ($stmt3 && ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC))) {
            $response['Institution_Visits'][] = $row;
        }

        // 4. Sales Target
        $sql4 = "SELECT FORMAT(ISNULL(SUM(vd.StudentNo * ISNULL(prd.Rate, 0)), 0), 'N2') AS Sales_Target
                 FROM sndVisitPlanDetails vd
                 JOIN sndProductReceiptdetails prd 
                    ON vd.FinancialYearID = prd.FinancialYearID AND vd.ProductID = prd.ProductID
                 JOIN sndVisitPlans vp 
                    ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.VEStatus = 1 
                   AND vp.VisitUserID = ? 
                   AND vp.VisitPlanDate BETWEEN ? AND ?";
        $stmt4 = sqlsrv_query($conn, $sql4, [$UserID, $date1, $date2]);
        $response['Sales_Target'] = ($stmt4 && ($row = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Target'] : "0.00";

        // 5. Sales Achievement
        $sql5 = "SELECT FORMAT(ISNULL(SUM(SubTotal), 0), 'N2') AS Sales_Achievement 
                 FROM sndSalesOrderDetails sod
                 JOIN sndSalesOrders so ON sod.SalesOrderID = so.SalesOrderID
                 WHERE so.UserID = ? AND so.OrderDate BETWEEN ? AND ?";
        $stmt5 = sqlsrv_query($conn, $sql5, [$UserID, $date1, $date2]);
        $response['Sales_Achievement'] = ($stmt5 && ($row = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Achievement'] : "0.00";

        // 6. Total Collection
        $sql6 = "SELECT FORMAT(ISNULL(SUM(AmountReceived), 0), 'N2') AS Total_Collection 
                 FROM sndMoneyReceipt 
                 WHERE ReceivedByUserID = ? AND MRDate BETWEEN ? AND ?";
        $stmt6 = sqlsrv_query($conn, $sql6, [$UserID, $date1, $date2]);
        $response['Total_Collection'] = ($stmt6 && ($row = sqlsrv_fetch_array($stmt6, SQLSRV_FETCH_ASSOC))) ? $row['Total_Collection'] : "0.00";

        // 7. BD Budget
        $sql61 = "SELECT FORMAT(ISNULL(SUM(TotalAmount), 0), 'N2') AS Total_BD_Budget
                  FROM sndBDExpReq 
                  WHERE UserID = ? AND BDExpReqDate BETWEEN ? AND ?";
        $stmt61 = sqlsrv_query($conn, $sql61, [$UserID, $date1, $date2]);
        $response['Total_BD_Budget'] = ($stmt61 && ($row = sqlsrv_fetch_array($stmt61, SQLSRV_FETCH_ASSOC))) ? $row['Total_BD_Budget'] : "0.00";

        // 8. TADA Expenses by Category
        $sql62 = "SELECT  
                    td.TADACategoryID, 
                    c.CategoryName AS ExpenseCategory, 
                    FORMAT(SUM(ISNULL(td.Amount, 0)), 'N2') AS Total_Amount
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 LEFT JOIN sndCategorydata c ON c.ID = td.TADACategoryID
                 WHERE vp.UserID = ? 
                   AND CONVERT(char(10), td.CreatedAt, 120) BETWEEN ? AND ?
                 GROUP BY td.TADACategoryID, c.CategoryName";
        $stmt62 = sqlsrv_query($conn, $sql62, [$UserID, $date1, $date2]);
        $response['Total_Expense'] = [];
        while ($stmt62 && ($row = sqlsrv_fetch_array($stmt62, SQLSRV_FETCH_ASSOC))) {
            $response['Total_Expense'][] = $row;
        }

        // Final response
        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function get_user_statistics_team_date($conn, $UserID, $date1, $date2) {
    try {
        $response = [];

        // 1. No of Institutions
        $sql1 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institution 
                 FROM sndInstitutions 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID in (select userid from sndusers where ReportingToUserID = ?))";
        $stmt1 = sqlsrv_query($conn, $sql1, [$UserID]);
        $response['No_of_Institution'] = ($stmt1 && ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Institution'] : "0.00";

        // 2. No of Parties
        $sql2 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Party 
                 FROM sndPartyMaster 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID in (select userid from sndusers where ReportingToUserID = ?))";
        $stmt2 = sqlsrv_query($conn, $sql2, [$UserID]);
        $response['No_of_Party'] = ($stmt2 && ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Party'] : "0.00";

        // 3. Institution Visits (fixed logic with JOIN instead of subqueries)
        $sql3 = "SELECT 
                    v.InstitutionTypeID,
                    c.CategoryName AS InstitutionType,
                    FORMAT(COUNT(*), 'N2') AS No_of_Institute_Visit  
                 FROM sndVisitPlans v
                 LEFT JOIN sndCategorydata c 
                    ON v.InstitutionTypeID = c.ID AND c.CategoryType = 'institution-type'
                 WHERE v.VEStatus = 1 
                   AND v.VisitUserID in (select userid from sndusers where ReportingToUserID = ?) 
                   AND v.VisitPlanDate BETWEEN ? AND ?
                 GROUP BY v.InstitutionTypeID, c.CategoryName";
        $stmt3 = sqlsrv_query($conn, $sql3, [$UserID, $date1, $date2]);
        $response['Institution_Visits'] = [];
        while ($stmt3 && ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC))) {
            $response['Institution_Visits'][] = $row;
        }

        // 4. Sales Target
        $sql4 = "SELECT FORMAT(ISNULL(SUM(vd.StudentNo * ISNULL(prd.Rate, 0)), 0), 'N2') AS Sales_Target
                 FROM sndVisitPlanDetails vd
                 JOIN sndProductReceiptdetails prd 
                    ON vd.FinancialYearID = prd.FinancialYearID AND vd.ProductID = prd.ProductID
                 JOIN sndVisitPlans vp 
                    ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.VEStatus = 1 
                   AND vp.VisitUserID in (select userid from sndusers where ReportingToUserID = ?) 
                   AND vp.VisitPlanDate BETWEEN ? AND ?";
        $stmt4 = sqlsrv_query($conn, $sql4, [$UserID, $date1, $date2]);
        $response['Sales_Target'] = ($stmt4 && ($row = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Target'] : "0.00";

        // 5. Sales Achievement
        $sql5 = "SELECT FORMAT(ISNULL(SUM(SubTotal), 0), 'N2') AS Sales_Achievement 
                 FROM sndSalesOrderDetails sod
                 JOIN sndSalesOrders so ON sod.SalesOrderID = so.SalesOrderID
                 WHERE so.UserID in (select userid from sndusers where ReportingToUserID = ?) AND so.OrderDate BETWEEN ? AND ?";
        $stmt5 = sqlsrv_query($conn, $sql5, [$UserID, $date1, $date2]);
        $response['Sales_Achievement'] = ($stmt5 && ($row = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Achievement'] : "0.00";

        // 6. Total Collection
        $sql6 = "SELECT FORMAT(ISNULL(SUM(AmountReceived), 0), 'N2') AS Total_Collection 
                 FROM sndMoneyReceipt 
                 WHERE ReceivedByUserID in (select userid from sndusers where ReportingToUserID = ?) AND MRDate BETWEEN ? AND ?";
        $stmt6 = sqlsrv_query($conn, $sql6, [$UserID, $date1, $date2]);
        $response['Total_Collection'] = ($stmt6 && ($row = sqlsrv_fetch_array($stmt6, SQLSRV_FETCH_ASSOC))) ? $row['Total_Collection'] : "0.00";

        // 7. BD Budget
        $sql61 = "SELECT FORMAT(ISNULL(SUM(TotalAmount), 0), 'N2') AS Total_BD_Budget
                  FROM sndBDExpReq 
                  WHERE UserID in (select userid from sndusers where ReportingToUserID = ?) AND BDExpReqDate BETWEEN ? AND ?";
        $stmt61 = sqlsrv_query($conn, $sql61, [$UserID, $date1, $date2]);
        $response['Total_BD_Budget'] = ($stmt61 && ($row = sqlsrv_fetch_array($stmt61, SQLSRV_FETCH_ASSOC))) ? $row['Total_BD_Budget'] : "0.00";

        // 8. TADA Expenses by Category
        $sql62 = "SELECT  
                    td.TADACategoryID, 
                    c.CategoryName AS ExpenseCategory, 
                    FORMAT(SUM(ISNULL(td.Amount, 0)), 'N2') AS Total_Amount
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 LEFT JOIN sndCategorydata c ON c.ID = td.TADACategoryID
                 WHERE vp.UserID in (select userid from sndusers where ReportingToUserID = ?)
                   AND CONVERT(char(10), td.CreatedAt, 120) BETWEEN ? AND ?
                 GROUP BY td.TADACategoryID, c.CategoryName";
        $stmt62 = sqlsrv_query($conn, $sql62, [$UserID, $date1, $date2]);
        $response['Total_Expense'] = [];
        while ($stmt62 && ($row = sqlsrv_fetch_array($stmt62, SQLSRV_FETCH_ASSOC))) {
            $response['Total_Expense'][] = $row;
        }

        // Final response
        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}



function get_user_statistics_team($conn, $UserID) {
    try {
        $response = [];

              // Example: No_of_Institution
        $sql1 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institution FROM sndInstitutions WHERE 
        RegionID in (select AreaID from sndMapEmpRegionRegionView where userid in (select userid from sndusers where ReportingToUserID = ?))";
        $stmt1 = sqlsrv_query($conn, $sql1, [$UserID]);
        $response['No_of_Institution'] = ($stmt1 && ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Institution'] : "0.00";


         // Query 2: Number of Parties
        $sql2 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Party 
                 FROM sndPartyMaster 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID in (select userid from sndusers where ReportingToUserID = ?))";
        $stmt2 = sqlsrv_query($conn, $sql2, [$UserID]);
        $response['No_of_Party'] = ($stmt2 && ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Party'] : 0;

        // Query 3: Institution Visits
        $sql3 = "SELECT 
        (SELECT InstitutionTypeID 
                     FROM sndCategorydata 
                     WHERE sndCategorydata.ID = sndVisitPlans.InstitutionTypeID 
                       AND CategoryType = 'institution-type') AS InstitutionTypeID,
                    (SELECT CategoryName 
                     FROM sndCategorydata 
                     WHERE sndCategorydata.ID = sndVisitPlans.InstitutionTypeID 
                       AND CategoryType = 'institution-type') AS InstitutionType, 
                    FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institute_Visit  
                 FROM sndVisitPlans 
                 WHERE VEStatus = 1 AND VisitUserID in (select userid from sndusers where ReportingToUserID = ?)
                 GROUP BY InstitutionTypeID";
        $stmt3 = sqlsrv_query($conn, $sql3, [$UserID]);
        $response['Institution_Visits'] = [];
        while ($stmt3 && ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC))) {
            $response['Institution_Visits'][] = $row;
        }

        // Query 4: Sales Target
        $sql4 = "SELECT 
                    FORMAT(ISNULL((SUM(vd.StudentNo) * AVG(prd.Rate)), 0), 'N2') AS Sales_Target
                 FROM sndVisitPlanDetails vd
                 JOIN sndProductReceiptdetails prd 
                    ON vd.FinancialYearID = prd.FinancialYearID 
                    AND vd.ProductID = prd.ProductID
                 JOIN sndVisitPlans vp 
                    ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.VEStatus = 1 AND vp.VisitUserID in (select userid from sndusers where ReportingToUserID = ?)";
        $stmt4 = sqlsrv_query($conn, $sql4, [$UserID]);
        $response['Sales_Target'] = ($stmt4 && ($row = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Target'] : 0;

        // Query 5: Sales Achievement
        $sql5 = "SELECT FORMAT(ISNULL(SUM(SubTotal), 0), 'N2') AS Sales_Achievement 
                 FROM sndSalesOrderDetails sod
                 JOIN sndSalesOrders so ON sod.SalesOrderID = so.SalesOrderID
                 WHERE so.UserID in (select userid from sndusers where ReportingToUserID = ?)";
        $stmt5 = sqlsrv_query($conn, $sql5, [$UserID]);
        $response['Sales_Achievement'] = ($stmt5 && ($row = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Achievement'] : 0;

        // Query 6: Total Collection
        $sql6 = "SELECT FORMAT(ISNULL(SUM(AmountReceived), 0), 'N2') AS Total_Collection 
                 FROM sndMoneyReceipt 
                 WHERE ReceivedByUserID in (select userid from sndusers where ReportingToUserID = ?)";
        $stmt6 = sqlsrv_query($conn, $sql6, [$UserID]);
        $response['Total_Collection'] = ($stmt6 && ($row = sqlsrv_fetch_array($stmt6, SQLSRV_FETCH_ASSOC))) ? $row['Total_Collection'] : 0;

           // (Your earlier queries for No_of_Institution, No_of_Party, Institution_Visits, Sales_Target, Sales_Achievement, Total_Collection)
        // ... [keep unchanged, same as before]

  
        // ... similarly for other non-expense queries (No_of_Party, Institution_Visits, Sales_Target, Sales_Achievement, Total_Collection)
        // (Insert all unchanged queries here for completeness)

        // Your non-expense queries here - same as your original function

        // Expense queries
        $expenseQueries = [
            'Business_Development_Expense' => [
                "SELECT  FORMAT(ISNULL(SUM(DonationAmount), 0), 'N2') AS Business_Development_Expense 
                 FROM sndVisitPlanDetails vd
                 JOIN sndVisitPlans vp ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.PurposeID = 79 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?)"
            ],
            // ... all other expense queries exactly as before ...
            'Specimen_Expense' => [
                "SELECT (ISNULL(sum(SpecimenQty)*isnull((select avg(Rate) from sndProductReceiptDetails prd where prd.ProductID = vd.ProductID and prd.FinancialYearID = vd.FinancialYearID),0), 0)) AS Specimen_Expense 
                 FROM sndVisitPlanDetails vd
                 JOIN sndVisitPlans vp ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.PurposeID = 124 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?)
                 GROUP BY vd.ProductID, vd.FinancialYearID"
            ],
            'TA_Expense' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS TA_Expense 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE  td.TADACategoryID = 21 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) GROUP BY td.TADACategoryID"
            ],
            // ... continue with all the others ...
            'DA_Expense' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS DA_Expense 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 22 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) GROUP BY td.TADACategoryID"
            ],
            'Teacher_Entertainment' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Teacher_Entertainment 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 23 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) GROUP BY td.TADACategoryID"
            ],
            // ... rest of your expense queries ...
         'Business_Development_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Business_Development_Exp 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 24 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Fuel_Lubricant_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Fuel_Lubricant_Exp
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 25 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Hotel_Rent' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Hotel_Rent 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 26 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Transport_Courier' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Transport_Courier 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 200 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Photocopy_Bill' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Photocopy_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 201 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Administrative_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Administrative_Exp
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 202 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Gift_Tips_Party' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Gift_Tips_Party 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 109 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Bank_Online_Charge' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Bank_Online_Charge  
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 203 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Others_Bill' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Others_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 204 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Mobile_Bill' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Mobile_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 139 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?)  group by td.TADACategoryID"
            ],
             'Bike' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Bike 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 206 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Text_RefetchData' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Text_RefetchData 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 183 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Repair_and_Maintenance' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Repair_and_Maintenance 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 77 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Specimen_Requisition' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Specimen_Requisition 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 84 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Specimen_Distribution' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Specimen_Distribution 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 123 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
             'Miscellaneous_Expenses' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Miscellaneous_Expenses 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 145 AND vp.UserID in (select userid from sndusers where ReportingToUserID = ?) group by td.TADACategoryID"
            ],
        ];

        $expenseList = [];

        foreach ($expenseQueries as $key => $query) {
            $stmt = sqlsrv_query($conn, $query[0], [$UserID]);
            if ($stmt && ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
                if (isset($row['TADACategoryID'])) {
                    $expenseList[] = [
                        'Name' => $key,
                        'TADACategoryID' => intval($row['TADACategoryID']),
                        $key => $row[$key]
                    ];
                } else {
                    $expenseList[] = [
                        'Name' => $key,
                        'TADACategoryID' => null,
                        $key => $row[$key]
                    ];
                }
            } else {
                $expenseList[] = [
                    'Name' => $key,
                    'TADACategoryID' => null,
                    $key => "0.00"
                ];
            }
        }

        $response['Expense'] = $expenseList;

        echo json_encode($response);

    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function get_user_statistics1($conn, $UserID) {
    try {
        // Initialize an empty array for results
        $response = [];

        // Query 1: Number of Institutions
        $sql1 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institution FROM sndInstitutions WHERE 
        RegionID in (select AreaID from sndMapEmpRegionRegionView where userid = ?)";
        $stmt1 = sqlsrv_query($conn, $sql1, [$UserID]);
        $response['No_of_Institution'] = ($stmt1 && ($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Institution'] : 0;

        // Query 2: Number of Parties
        $sql2 = "SELECT FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Party 
                 FROM sndPartyMaster 
                 WHERE RegionID IN (SELECT AreaID FROM sndMapEmpRegionRegionView WHERE UserID = ?)";
        $stmt2 = sqlsrv_query($conn, $sql2, [$UserID]);
        $response['No_of_Party'] = ($stmt2 && ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))) ? $row['No_of_Party'] : 0;

        // Query 3: Institution Visits
        $sql3 = "SELECT 
                    (SELECT CategoryName 
                     FROM sndCategorydata 
                     WHERE sndCategorydata.ID = sndVisitPlans.InstitutionTypeID 
                       AND CategoryType = 'institution-type') AS InstitutionType, 
                    FORMAT(ISNULL(COUNT(*), 0), 'N2') AS No_of_Institute_Visit  
                 FROM sndVisitPlans 
                 WHERE VEStatus = 1 AND VisitUserID = ? 
                 GROUP BY InstitutionTypeID";
        $stmt3 = sqlsrv_query($conn, $sql3, [$UserID]);
        $response['Institution_Visits'] = [];
        while ($stmt3 && ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC))) {
            $response['Institution_Visits'][] = $row;
        }

        // Query 4: Sales Target
        $sql4 = "SELECT 
                    FORMAT(ISNULL((SUM(vd.StudentNo) * AVG(prd.Rate)), 0), 'N2') AS Sales_Target
                 FROM sndVisitPlanDetails vd
                 JOIN sndProductReceiptdetails prd 
                    ON vd.FinancialYearID = prd.FinancialYearID 
                    AND vd.ProductID = prd.ProductID
                 JOIN sndVisitPlans vp 
                    ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.VEStatus = 1 AND vp.VisitUserID = ?";
        $stmt4 = sqlsrv_query($conn, $sql4, [$UserID]);
        $response['Sales_Target'] = ($stmt4 && ($row = sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Target'] : 0;

        // Query 5: Sales Achievement
        $sql5 = "SELECT FORMAT(ISNULL(SUM(SubTotal), 0), 'N2') AS Sales_Achievement 
                 FROM sndSalesOrderDetails sod
                 JOIN sndSalesOrders so ON sod.SalesOrderID = so.SalesOrderID
                 WHERE so.UserID = ?";
        $stmt5 = sqlsrv_query($conn, $sql5, [$UserID]);
        $response['Sales_Achievement'] = ($stmt5 && ($row = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC))) ? $row['Sales_Achievement'] : 0;

        // Query 6: Total Collection
        $sql6 = "SELECT FORMAT(ISNULL(SUM(AmountReceived), 0), 'N2') AS Total_Collection 
                 FROM sndMoneyReceipt 
                 WHERE ReceivedByUserID = ?";
        $stmt6 = sqlsrv_query($conn, $sql6, [$UserID]);
        $response['Total_Collection'] = ($stmt6 && ($row = sqlsrv_fetch_array($stmt6, SQLSRV_FETCH_ASSOC))) ? $row['Total_Collection'] : 0;

        // Query 7-11: Various Expenses
        $expenseQueries = [
            'Business_Development_Expense' => [
                "SELECT  FORMAT(ISNULL(SUM(DonationAmount), 0), 'N2') AS Business_Development_Expense 
                 FROM sndVisitPlanDetails vd
                 JOIN sndVisitPlans vp ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.PurposeID = 79 AND vp.UserID = ?"
            ],
            'Specimen_Expense' => [
                "SELECT (ISNULL(sum(SpecimenQty)*isnull((select avg(Rate) from sndProductReceiptDetails prd where prd.ProductID = vd.ProductID and prd.FinancialYearID = vd.FinancialYearID),0), 0)) AS Specimen_Expense 
                 FROM sndVisitPlanDetails vd
                 JOIN sndVisitPlans vp ON vd.VisitPlanID = vp.VisitPlanID
                 WHERE vp.PurposeID = 124 AND vp.UserID = ?
				 group by vd.ProductID, vd.FinancialYearID"
            ],
            'TA_Expense' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS TA_Expense 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE  td.TADACategoryID = 21 AND vp.UserID = ? group by td.TADACategoryID"
            ],
            'DA_Expense' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS DA_Expense 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 22 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Teacher_Entertainment' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Teacher_Entertainment 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 23 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Business_Development_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Business_Development_Exp 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 24 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Fuel_Lubricant_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Fuel_Lubricant_Exp
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 25 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Hotel_Rent' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Hotel_Rent 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 26 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Transport_Courier' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Transport_Courier 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 200 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Photocopy_Bill' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Photocopy_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 201 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Administrative_Exp' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Administrative_Exp
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 202 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Gift_Tips_Party' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Gift_Tips_Party 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 109 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Bank_Online_Charge' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Bank_Online_Charge  
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 203 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Others_Bill' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Others_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 204 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Mobile_Bill' => [
                "SELECT td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Mobile_Bill 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 139 AND vp.UserID = ?  group by td.TADACategoryID"
            ],
             'Bike' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Bike 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 206 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Text_RefetchData' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Text_RefetchData 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 183 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Repair_and_Maintenance' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Repair_and_Maintenance 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 77 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Specimen_Requisition' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Specimen_Requisition 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 84 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Specimen_Distribution' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Specimen_Distribution 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 123 AND vp.UserID = ? group by td.TADACategoryID"
            ],
             'Miscellaneous_Expenses' => [
                "SELECT  td.TADACategoryID, FORMAT(ISNULL(SUM(Amount), 0), 'N2') AS Miscellaneous_Expenses 
                 FROM sndVisitPlanTADADetails td
                 JOIN sndVisitPlans vp ON td.VisitPlanID = vp.VisitPlanID
                 WHERE td.TADACategoryID = 145 AND vp.UserID = ? group by td.TADACategoryID"
            ],
        ];

        foreach ($expenseQueries as $key => $query) {
            $stmt = sqlsrv_query($conn, $query[0], [$UserID]);
            $response[$key] = ($stmt && ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) ? $row[$key] : 0;
        }

        // Return all results as JSON
        echo json_encode($response);
    } catch (Exception $e) {
        // Handle errors
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function get_salesordersAutorizationMIS($conn, $SalesOrderID) {
    //$sql = "SELECT avg(Rate) as Rate FROM sndProductReceipt WHERE FinancialYearID = ? AND ProductID = ?";
	$sql = "
SELECT 
    -- Fetching Financial Year
    (SELECT Name 
     FROM dbo.CmnTransactionalYears 
     WHERE Id = sio.FinancialYearID) AS FinancialYear, 

    -- Fetching Books Group
    (SELECT CategoryName 
     FROM dbo.sndCategorydata 
     WHERE ID = sio.ProductCategoryID) AS BooksGroup,

    -- Fetching Product Name
    (SELECT ProductName 
     FROM dbo.sndProducts 
     WHERE ProductID = sio.ProductID) AS ProductName, 

    -- Total Demand (sum of Quantity where TransactionType = 'Demand-In')
    SUM(sio.Quantity) AS TotalDemand, 
    
    -- Total Donation (sum of Rate)
    SUM(sio.Rate) AS TotalDonation,

    -- Issued Qty (sum of Quantity where TransactionType = 'Stock-Out')
    (SELECT ISNULL(SUM(sio_out.Quantity), 0) 
     FROM sndStockInOut sio_out
     WHERE sio_out.ProductID = sio.ProductID 
     AND sio_out.FinancialYearID = sio.FinancialYearID 
     AND sio_out.TransactionType = 'Stock-Out' 
     AND sio_out.DistrictID = sio.DistrictID) AS TotalIssuedQty,

    -- Pending Qty (Demand - Issued)
    (SUM(sio.Quantity) - 
        (SELECT ISNULL(SUM(sio_out.Quantity), 0) 
         FROM sndStockInOut sio_out
         WHERE sio_out.ProductID = sio.ProductID 
         AND sio_out.FinancialYearID = sio.FinancialYearID 
         AND sio_out.TransactionType = 'Stock-Out' 
         AND sio_out.DistrictID = sio.DistrictID)) AS PendingQty,

    -- Concatenated field with Demand Qty, Issued Qty, Pending Qty, and BD Exp. Tk. (Two-line format)
    CONCAT(
        'Demand Qty-', FORMAT(ISNULL(SUM(sio.Quantity), 0), 'N2'), 
        ', Issued Qty-', FORMAT(ISNULL(
            (SELECT SUM(sio_out.Quantity) 
             FROM sndStockInOut sio_out
             WHERE sio_out.ProductID = sio.ProductID 
             AND sio_out.FinancialYearID = sio.FinancialYearID 
             AND sio_out.TransactionType = 'Stock-Out' 
             AND sio_out.DistrictID = sio.DistrictID), 0), 'N2'),  
        CHAR(13) + CHAR(10),  -- Line Break
        'Pending Qty-', FORMAT(
            (SUM(sio.Quantity) - 
            (SELECT ISNULL(SUM(sio_out.Quantity), 0) 
             FROM sndStockInOut sio_out
             WHERE sio_out.ProductID = sio.ProductID 
             AND sio_out.FinancialYearID = sio.FinancialYearID 
             AND sio_out.TransactionType = 'Stock-Out' 
             AND sio_out.DistrictID = sio.DistrictID)), 'N2'),
        ', BD Exp. Tk.- ', FORMAT(SUM(sio.Rate), 'N2')
    ) AS ProductsValue

FROM 
    sndStockInOut sio
JOIN 
    sndSalesOrderDetails sod ON sio.FinancialYearID = sod.FinancialYearID 
    AND sio.ProductCategoryID = sod.ProductCategoryID 
    AND sio.ProductID = sod.ProductID
JOIN 
    sndSalesOrders so ON so.SalesOrderID = sod.SalesOrderID 
JOIN 
    sndPartyMaster pm ON pm.PartyID = so.PartyID AND pm.DistrictID = sio.DistrictID

WHERE 
    sio.FinancialYearID = 
        (SELECT id FROM CmnTransactionalYears 
         WHERE CmnCompanyId = 2 AND ModuleId = 06 AND Status = 1 
         AND RIGHT(Name, 2) = RIGHT(CONVERT(CHAR(10), GETDATE(), 105), 2))
    AND sio.TransactionType = 'Demand-In' 
    AND so.OrderTypeID = 1 
    AND RIGHT(sio.VoucherReference, 2) = RIGHT(CONVERT(CHAR(10), GETDATE(), 105), 2)
    AND so.SalesOrderID = 1216

GROUP BY 
    sio.FinancialYearID, 
    sio.ProductCategoryID, 
    sio.ProductID, 
    sio.DistrictID;

";
    $params = [$SalesOrderID];
    
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product rate: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $AComments = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $AComments[] = $row;
    }

   echo json_encode($AComments);
}


function get_salesordersAutorizationMISReturn($conn, $SalesOrderID) {
    //$sql = "SELECT avg(Rate) as Rate FROM sndProductReceipt WHERE FinancialYearID = ? AND ProductID = ?";
	$sql = "select 
    ROW_NUMBER() OVER (PARTITION BY prd.FinancialYearID ORDER BY prd.FinancialYearID) AS SL,
    CONCAT((select ProductName from sndProducts pr where pr.ProductID = prd.ProductID), ' - ', right(prd.FinancialYearID,4)) as ProductName, 
	CONCAT(sum(quantity), ' Pcs', ' @ Tk. ', FORMAT(ISNULL(avg(rate), 0), 'N2'), ' = ', FORMAT(ISNULL(sum(quantity)*avg(rate), 0), 'N2')) as ProductsValue  
	from sndProductReturnDetails prd, sndProductReturn pr
where pr.ProductReturnID = prd.ProductReturnID 
and convert(char(11),pr.ReturnDate,120) between '2024-01-01' and '2024-21-31' 
and pr.PartyID = (select partyid from sndSalesOrders where SalesOrderID = ?)
group by prd.FinancialYearID, prd.ProductID";
    $params = [$SalesOrderID];
    
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product rate: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $AComments = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $AComments[] = $row;
    }

   echo json_encode($AComments);
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

function get_allparticulars($conn) {
    $sql = "SELECT * FROM sndParticulars";
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

function get_particulars($conn, $ParticularsID) {
    $sql = "SELECT * FROM sndParticulars WHERE ParticularsID = ?";
    $params = [$ParticularsID];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching regiontype: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $regiontype = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($regiontype) {
        echo json_encode($regiontype);
    } else {
        echo json_encode(["error" => "Particulars not found"]);
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
	$sql = "select ID, name as CategoryName from HrmDesignations where CmnCompanyId = 4 and name in (select Designation from sndUsers where status =1)";
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

function get_BDExpReq($conn, $BDExpReqID) {
    $sql = "SELECT 
    sndBDExpReq.BDExpReqID,
    sndBDExpReq.BDExpReqNo,
    sndBDExpReq.BDExpUserID,
	convert(char(11),sndBDExpReq.BDExpReqDate,120) as BDExpReqDate,
    sndBDExpReq.InstitutionTypeID,
    sndCategorydata.id AS InstitutionTypeID,
    sndCategorydata.CategoryName AS InstitutionTypeName,
    sndBDExpReq.InstitutionID,
    sndInstitutions.InstitutionName, -- Added InstitutionName
    FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2') as TotalAmount,
    sndBDExpReq.UserID
FROM 
    dbo.sndBDExpReq
LEFT JOIN 
    sndCategorydata
ON 
    sndBDExpReq.InstitutionTypeID = sndCategorydata.id
AND 
    sndCategorydata.CategoryType = 'institution-type'
LEFT JOIN 
    sndInstitutions
ON 
    sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID
 WHERE BDExpReqID = ?";
    $params = [$BDExpReqID];
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


function get_BDExpReqDetails($conn, $BDExpReqDetailsID) {
    $sql = "SELECT [BDExpReqDetailsID]
      ,[BDExpReqID]
      ,[TeacherName]
      ,[Designation]
      ,[ContactPhone]
      ,[BooksGroupID]
      ,FinancialYearID
       , (select name from CmnTransactionalYears WHERE CmnTransactionalYears.ID = sndBDExpReqDetails.FinancialYearID) as FinancialYear
	  ,(select CategoryName from sndCategorydata WHERE CategoryType = 'books-category' and sndCategorydata.id = BooksGroupID) as BooksGroup
      ,[ProductID],
	  (SELECT ProductName FROM sndProducts WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID) as ProductName
      ,[StudentsCount]
      ,[DonationAmount]
      ,DonationDisbrush
      ,DonationAmount-DonationDisbrush as DonationBalance
  FROM [dbo].[sndBDExpReqDetails] WHERE BDExpReqDetailsID = ?";
    $params = [$BDExpReqDetailsID];
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

function get_BDExpReqs($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY sndBDExpReq.BDExpReqID) AS SL, 
    sndBDExpReq.BDExpReqID,
    sndBDExpReq.BDExpReqNo,
    CONCAT(sndBDExpReq.BDExpReqNo,' -', 'Tk. ', FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2')) as BDExpInfo1,
    CONCAT(convert(char(10),sndBDExpReq.BDExpReqDate,105),' - ', (select Statusmeans from sndStatus where sndStatus.status = sndBDExpReq.status and statustables = 'sndBDExpReq')) as BDExpInfo2,    
     case when sndBDExpReq.InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
             end as BDExpInfo3,
    sndBDExpReq.BDExpUserID,
    CONVERT(char(11), sndBDExpReq.BDExpReqDate, 120) AS BDExpReqDate,
    sndBDExpReq.InstitutionTypeID,
    sndCategorydata.id AS InstitutionTypeID,
    sndCategorydata.CategoryName AS InstitutionTypeName,
    sndBDExpReq.InstitutionID,
case when sndBDExpReq.InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
             end as InstitutionName, -- Added InstitutionName
    FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2') as TotalAmount,
    sndBDExpReq.UserID,
    (select Statusmeans from sndStatus where sndStatus.status = sndBDExpReq.status and statustables = 'sndBDExpReq') as Status,
    CASE 
        WHEN EXISTS (
            SELECT 1
            FROM sndBDExpReqDetails
            WHERE sndBDExpReqDetails.BDExpReqID = sndBDExpReq.BDExpReqID
        ) THEN 'True'
        ELSE 'False'
    END AS DetailsStatus
FROM 
    dbo.sndBDExpReq
LEFT JOIN 
    sndCategorydata
ON 
    sndBDExpReq.InstitutionTypeID = sndCategorydata.id
AND 
    sndCategorydata.CategoryType = 'institution-type'
LEFT JOIN 
    sndInstitutions
ON 
    sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID order by BDExpReqID desc;";
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

function get_BDExpReqs_users($conn, $UserID) {

if (in_array($UserID, [2851,69,1718,1716])) { 

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY sndBDExpReq.BDExpReqID) AS SL, 
    sndBDExpReq.BDExpReqID,
    sndBDExpReq.BDExpReqNo,
    CONCAT(sndBDExpReq.BDExpReqNo,' -', 'Tk. ', FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2')) as BDExpInfo1,
    CONCAT(convert(char(10),sndBDExpReq.BDExpReqDate,105),' - ', (select Statusmeans from sndStatus where sndStatus.status = sndBDExpReq.status and statustables = 'sndBDExpReq')) as BDExpInfo2,    
     case when sndBDExpReq.InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
             end as BDExpInfo3,
    sndBDExpReq.BDExpUserID,
    CONVERT(char(11), sndBDExpReq.BDExpReqDate, 120) AS BDExpReqDate,
    sndBDExpReq.InstitutionTypeID,
    sndCategorydata.id AS InstitutionTypeID,
    sndCategorydata.CategoryName AS InstitutionTypeName,
    sndBDExpReq.InstitutionID,
case when sndBDExpReq.InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
             end as InstitutionName, -- Added InstitutionName
    FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2') as TotalAmount,
    sndBDExpReq.UserID,
    (select Statusmeans from sndStatus where sndStatus.status = sndBDExpReq.status and statustables = 'sndBDExpReq') as Status,
    CASE 
        WHEN EXISTS (
            SELECT 1
            FROM sndBDExpReqDetails
            WHERE sndBDExpReqDetails.BDExpReqID = sndBDExpReq.BDExpReqID
        ) THEN 'True'
        ELSE 'False'
    END AS DetailsStatus
FROM 
    dbo.sndBDExpReq
LEFT JOIN 
    sndCategorydata
ON 
    sndBDExpReq.InstitutionTypeID = sndCategorydata.id
AND 
    sndCategorydata.CategoryType = 'institution-type'
LEFT JOIN 
    sndInstitutions
ON 
    sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID 
    order by BDExpReqID desc;";

    $stmt = sqlsrv_query($conn, $sql);

} else {   

    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY sndBDExpReq.BDExpReqID) AS SL, 
    sndBDExpReq.BDExpReqID,
    sndBDExpReq.BDExpReqNo,
    CONCAT(sndBDExpReq.BDExpReqNo,' -', 'Tk. ', FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2')) as BDExpInfo1,
    CONCAT(convert(char(10),sndBDExpReq.BDExpReqDate,105),' - ', (select Statusmeans from sndStatus where sndStatus.status = sndBDExpReq.status and statustables = 'sndBDExpReq')) as BDExpInfo2,    
     case when sndBDExpReq.InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
             end as BDExpInfo3,
    sndBDExpReq.BDExpUserID,
    CONVERT(char(11), sndBDExpReq.BDExpReqDate, 120) AS BDExpReqDate,
    sndBDExpReq.InstitutionTypeID,
    sndCategorydata.id AS InstitutionTypeID,
    sndCategorydata.CategoryName AS InstitutionTypeName,
    sndBDExpReq.InstitutionID,
case when sndBDExpReq.InstitutionID is null then 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
            else
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
             end as InstitutionName, -- Added InstitutionName
    FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2') as TotalAmount,
    sndBDExpReq.UserID,
    (select Statusmeans from sndStatus where sndStatus.status = sndBDExpReq.status and statustables = 'sndBDExpReq') as Status,
    CASE 
        WHEN EXISTS (
            SELECT 1
            FROM sndBDExpReqDetails
            WHERE sndBDExpReqDetails.BDExpReqID = sndBDExpReq.BDExpReqID
        ) THEN 'True'
        ELSE 'False'
    END AS DetailsStatus
FROM 
    dbo.sndBDExpReq
LEFT JOIN 
    sndCategorydata
ON 
    sndBDExpReq.InstitutionTypeID = sndCategorydata.id
AND 
    sndCategorydata.CategoryType = 'institution-type'
LEFT JOIN 
    sndInstitutions
ON 
    sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID 
    where 
   sndBDExpReq.UserID = ?
   or  sndBDExpReq.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)
   or  sndBDExpReq.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))
   or  sndBDExpReq.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?)))
   or  sndBDExpReq.UserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID in (SELECT UserID FROM sndUsers WHERE ReportingToUserID = ?))))
    order by BDExpReqID desc;";

$params = [$UserID, $UserID, $UserID, $UserID, $UserID];
$stmt = sqlsrv_query($conn, $sql, $params);

}

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


function get_BDExpReqAll($conn, $BDExpReqID) {
    // Query to fetch main BDExpReq details
    $sqlMain = "
        SELECT 
    sndBDExpReq.BDExpReqID,
    CONCAT(sndBDExpReq.BDExpReqNo, ' - ', FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2')) AS BDInfo1,
    CONVERT(CHAR(10), sndBDExpReq.BDExpReqDate, 105) AS BDInfo2,
    CASE 
        WHEN sndBDExpReq.InstitutionID IS NULL THEN 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
        ELSE
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
    END AS BDInfo3,
    sndBDExpReq.BDExpReqNo,
    sndBDExpReq.BDExpUserID,
    CONVERT(CHAR(11), sndBDExpReq.BDExpReqDate, 120) AS BDExpReqDate,
    sndBDExpReq.InstitutionTypeID,
    sndCategorydata.id AS InstitutionTypeID,
    sndCategorydata.CategoryName AS InstitutionTypeName,
    sndBDExpReq.InstitutionID,

    -- Institution Name
    CASE 
        WHEN sndBDExpReq.InstitutionID IS NULL THEN 
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndBDExpReq.PartyID)
        ELSE
            (SELECT InstitutionName 
             FROM sndInstitutions 
             WHERE InstitutionID = sndBDExpReq.InstitutionID)
    END AS InstitutionName,

    -- Institution Address (NEW FIELD)
    sndInstitutions.Address AS InsAddress,

    -- Merging District and Thana Names as InstituteLocation
    (SELECT STUFF(
        (SELECT DISTINCT ' | ' + DistrictName + ', ' + ThanaName
         FROM sndMapEmpRegion 
         WHERE sndMapEmpRegion.DistrictID = sndInstitutions.DistrictID
         AND sndMapEmpRegion.ThanaID = sndInstitutions.ThanaID
         FOR XML PATH(''), TYPE).value('.', 'NVARCHAR(MAX)'),
        1, 3, '') 
    ) AS InstituteLocation,

    FORMAT(ISNULL(sndBDExpReq.TotalAmount, 0), 'N2') as TotalAmount,
    sndBDExpReq.UserID,

    -- Fetching Employee Name
    (SELECT EmpName 
     FROM sndUsers 
     WHERE sndUsers.UserID = sndBDExpReq.UserID) AS DepositEmpName,

    -- Fetching Designation
    (SELECT Designation 
     FROM sndUserView 
     WHERE sndUserView.UserID = sndBDExpReq.UserID) AS Designation

FROM 
    dbo.sndBDExpReq
LEFT JOIN 
    sndCategorydata
    ON sndBDExpReq.InstitutionTypeID = sndCategorydata.id
    AND sndCategorydata.CategoryType = 'institution-type'
LEFT JOIN 
    sndInstitutions
    ON sndBDExpReq.InstitutionID = sndInstitutions.InstitutionID
        WHERE 
            sndBDExpReq.BDExpReqID = ?
    ";

    // Query to fetch related BDExpReqDetails
    $sqlDetails = "
        SELECT 
            ROW_NUMBER() OVER (PARTITION BY BDExpReqID ORDER BY BDExpReqDetailsID) AS SL,
            [BDExpReqDetailsID],
            [BDExpReqID],
            [TeacherName] AS BDEDetails1,
            ContactPhone AS BDEDetails2,
            CONCAT(ContactPhone,' - ',(SELECT CategoryName 
             FROM sndCategorydata 
             WHERE CategoryType = 'books-category' 
               AND sndCategorydata.id = BooksGroupID) ) as BDEDetails2,
            (SELECT ProductName 
             FROM sndProducts 
             WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID) AS BDEDetails3,
             CONCAT('Student - ',StudentsCount,' -', 'Tk. ', DonationAmount) as BDEDetails4,
            [TeacherName],
            [Designation],
            [ContactPhone],
            [FinancialYearID],
            [BooksGroupID],
            (SELECT CategoryName 
             FROM sndCategorydata 
             WHERE CategoryType = 'books-category' 
               AND sndCategorydata.id = BooksGroupID) AS BooksGroup,
            [ProductID],
            (SELECT ProductName 
             FROM sndProducts 
             WHERE sndProducts.ProductID = sndBDExpReqDetails.ProductID) AS ProductName,
            [StudentsCount],
            [DonationAmount]
        FROM 
            [dbo].[sndBDExpReqDetails]
        WHERE 
            BDExpReqID = ?
    ";

    // Query to fetch approval details
    $sqlApprovals = "
        SELECT
            MAX(CASE WHEN d.AppStatus = 2 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CheckedDate,
            MAX(CASE WHEN d.AppStatus = 2 THEN u.EmpName + ' ' + u.Designation END) AS CheckedBy,
            MAX(CASE WHEN d.AppStatus = 2 THEN ISNULL(d.CheckedComments, '') END) AS CheckedComments,

            MAX(CASE WHEN d.AppStatus = 3 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AuthDate,
            MAX(CASE WHEN d.AppStatus = 3 THEN u.EmpName + ' ' + u.Designation END) AS AuthBy,
            MAX(CASE WHEN d.AppStatus = 3 THEN ISNULL(d.AuthComments, '') END) AS AuthComments,

            MAX(CASE WHEN d.AppStatus = 4 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS AppDate,
            MAX(CASE WHEN d.AppStatus = 4 THEN u.EmpName + ' ' + u.Designation END) AS AppBy,
            MAX(CASE WHEN d.AppStatus = 4 THEN ISNULL(d.AppComments, '') END) AS AppComments,

            MAX(CASE WHEN d.AppStatus = 5 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS RejectDate,
            MAX(CASE WHEN d.AppStatus = 5 THEN u.EmpName + ' ' + u.Designation END) AS RejectBy,
            MAX(CASE WHEN d.AppStatus = 5 THEN ISNULL(d.RejectComments, '') END) AS RejectComments,

            MAX(CASE WHEN d.AppStatus = 6 THEN CONVERT(CHAR(19), d.CreatedAt, 120) END) AS CancelledDate,
            MAX(CASE WHEN d.AppStatus = 6 THEN u.EmpName + ' ' + u.Designation END) AS CancelledBy,
            MAX(CASE WHEN d.AppStatus = 6 THEN ISNULL(d.CanclledComments, '') END) AS CanclledComments
        FROM 
            sndApprovalDetails d
        INNER JOIN 
            sndUserView u ON d.UserID = u.UserID
        WHERE 
            d.ApprovalType = 'sndBDExpReq' 
            AND d.ApprovalTypeID = ?
    ";

    // Execute the main query
    $paramsMain = [$BDExpReqID];
    $stmtMain = sqlsrv_query($conn, $sqlMain, $paramsMain);

    if ($stmtMain === false) {
        echo json_encode(["error" => "Error fetching BDExpReq: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $BDExpReq = sqlsrv_fetch_array($stmtMain, SQLSRV_FETCH_ASSOC);

    if (!$BDExpReq) {
        echo json_encode(["error" => "BDExpReqID not found"]);
        return;
    }

    // Execute the details query
    $paramsDetails = [$BDExpReqID];
    $stmtDetails = sqlsrv_query($conn, $sqlDetails, $paramsDetails);

    if ($stmtDetails === false) {
        echo json_encode(["error" => "Error fetching BDExpReqDetails: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $BDExpReqDetails = [];
    while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
        $BDExpReqDetails[] = $row;
    }

    // Execute the approvals query
    $paramsApprovals = [$BDExpReqID];
    $stmtApprovals = sqlsrv_query($conn, $sqlApprovals, $paramsApprovals);

    if ($stmtApprovals === false) {
        echo json_encode(["error" => "Error fetching approvals: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $BDExpReqApprovals = sqlsrv_fetch_array($stmtApprovals, SQLSRV_FETCH_ASSOC);

    // Combine main data with details and approvals
    $result = [
        "BDExpReq" => $BDExpReq,
        "BDExpReqDetails" => $BDExpReqDetails,
        "BDExpReqApprovals" => $BDExpReqApprovals
    ];

    // Return JSON response
    echo json_encode($result);
}

// Fetch all bookscategorys
function get_all_bookscategorys($conn) {
    $sql = "SELECT ID, CategoryName FROM sndCategorydata where CategoryType = 'books-category' AND ID NOT IN (216, 218, 221)";
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

// Fetch all tada_allowances
function get_all_ThansportMedia($conn) {
    header('Content-Type: application/json');

    $sql = "SELECT * FROM sndThansportMedia";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching transport media: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $tada_allowances = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $tada_allowances[] = $row;
    }

    echo json_encode($tada_allowances);
}


// Fetch a single tada_allowance by ThansportMediaID
function get_ThansportMedia($conn, $ThansportMediaID) {
    $sql = "SELECT * FROM sndThansportMedia WHERE ThansportMediaID = ?";
    $params = [$ThansportMediaID];
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
    
    // Define parameters array (same pattern as your working function)
    $params = array(
        array($UserID, SQLSRV_PARAM_IN)
    );
    
    // Execute the query using sqlsrv_query (procedural style)
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    // Check if query executed successfully
    if ($stmt === false) {
        $errors = sqlsrv_errors();
        echo json_encode(["error" => "SQL Server Error: " . print_r($errors, true)]);
        return;
    }
    
    // Fetch all results as associative array
    $data = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }
    
    // Free the statement resource
    sqlsrv_free_stmt($stmt);
    
    // Return JSON response (same as your working function)
    echo json_encode($data);
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

function get_all_sndUsers_web($conn) { 
    $sql = "SELECT 
                u.[UserID], 
                u.[EmployeeID], 
                u.[EmpName], 
                u.[DesignationID],
                (SELECT name FROM HrmDesignations WHERE CmnCompanyId = 2 AND HrmDesignations.ID = u.DesignationID) AS Designation,
                u.[Username], 
                u.[Email], 
                u.[Phone], 
                u.[Address], 
                r.[EmpName] AS ReportingToUserID, 
                u.[Status], 
                u.[CreatedAt], 
                u.[ModifiedAt],
                STUFF((
                    SELECT '; ' + CONCAT(ISNULL(mer.AreaName, ''), ', ', ISNULL(mer.ThanaName, ''), ', ', ISNULL(mer.DistrictName, ''), ', ', ISNULL(mer.DivisionName, ''))
                    FROM sndMapEmpRegion mer 
                    WHERE u.UserID = mer.UserID
                    FOR XML PATH('')
                ), 1, 2, '') AS Regions
            FROM sndUsers u
            LEFT JOIN sndUsers r ON u.ReportingToUserID = r.UserID 
            WHERE u.Status IS NOT NULL 
            GROUP BY 
                u.[UserID], 
                u.[EmployeeID], 
                u.[EmpName], 
                u.[DesignationID], 
                u.[Username], 
                u.[Email], 
                u.[Phone], 
                u.[Address], 
                r.[EmpName], 
                u.[Status], 
                u.[CreatedAt], 
                u.[ModifiedAt]
            ORDER BY u.[UserID] DESC";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error executing query: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $all_sndUsers = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $all_sndUsers[] = $row;
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


function get_all_sndUsers($conn) { 
    $sql = "SELECT u.[UserID], u.[EmployeeID], u.[EmpName], u.[DesignationID],
(select name from
 HrmDesignations where CmnCompanyId = 2  and HrmDesignations.ID = u.DesignationID) as Designation,
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
    d.Name AS Designation,
    u.Username,
    u.Email,
    u.Phone,
    u.Address,
    u.ReportingToUserID,
    (SELECT EmpName FROM sndUsers sndus WHERE sndus.UserID = u.ReportingToUserID) AS ReportingToUserName,
    u.Status,
    u.Userpicture,
    u.CreatedAt
FROM 
    sndUsers u
LEFT JOIN 
    HrmDesignations d ON u.DesignationID = d.ID
WHERE 
     u.Status =1 and u.UserID = ?
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
        $userDetails['Userpicture'] = 'http://192.168.88.116/ABPolymer/' . $userDetails['Userpicture'];
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

function generate_new_product_Transfer_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "PTN";

    // Query to fetch the latest ProductReceiptNo
    $sqlLastOrder = "SELECT TOP 1 ProductTransferNo as VisitPlanNo FROM sndProductTransfer ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last product receipt number: " . print_r(sqlsrv_errors(), true)]);
        Transfer;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['VisitPlanNo']) && preg_match('/PTN-(\d+)\/\d{2}-\d{2}/', $row['VisitPlanNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next product receipt number
    $nextNumber = $lastNumber + 1;
    $NewVisitPlanNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Transfer the newly generated product receipt number
    echo json_encode(["newProductTransferNo" => $NewVisitPlanNo]);
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

function generate_new_product_receipt_number1($conn) {
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


function generate_new_product_return_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "PRN";

    // Query to fetch the latest ProductReceiptNo
    $sqlLastOrder = "SELECT TOP 1 ProductReturnNo as VisitPlanNo FROM sndProductReturn ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last product receipt number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['VisitPlanNo']) && preg_match('/PRN-(\d+)\/\d{2}-\d{2}/', $row['VisitPlanNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next product receipt number
    $nextNumber = $lastNumber + 1;
    $NewVisitPlanNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated product receipt number
    echo json_encode(["newProductReturnNo" => $NewVisitPlanNo]);
}


function generate_new_visit_plan_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "VP";

    // Query to fetch the latest ProductReceiptNo
    $sqlLastOrder = "SELECT TOP 1 VisitPlanNo FROM sndVisitPlans ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last product receipt number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['VisitPlanNo']) && preg_match('/VP-(\d+)\/\d{2}-\d{2}/', $row['VisitPlanNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next product receipt number
    $nextNumber = $lastNumber + 1;
    $NewVisitPlanNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated product receipt number
    echo json_encode(["newVisitPlanNo" => $NewVisitPlanNo]);
}



function generate_new_BDExpReq_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "BDE";

    // Query to fetch the latest ProductReceiptNo
    $sqlLastOrder = "SELECT TOP 1 BDExpReqNo FROM sndBDExpReq ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last product receipt number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['BDExpReqNo']) && preg_match('/BDE-(\d+)\/\d{2}-\d{2}/', $row['BDExpReqNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next product receipt number
    $nextNumber = $lastNumber + 1;
    $newProductReceiptNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated product receipt number
    echo json_encode(["newBDExpReqNo" => $newProductReceiptNo]);
}

function get_MoneyReceiptApproval($conn, $UserID) {
    if (empty($UserID)) {
        echo json_encode(["error" => "UserID is required"]);
        return;
    }

if (in_array($UserID, [2851,69,1718,1716])) { 
    // SQL query with proper structure and consistency
    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
    MRID,
    CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
            MRNo,
            CONVERT(CHAR(11), MRDate, 120) AS MRDate,
            PartyID,
            (SELECT RegionID 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) AS RegionID,
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndMoneyReceipt.PartyID) AS PartyName,
            Status,
            (SELECT StatusMeans 
             FROM sndStatus 
             WHERE Status = sndMoneyReceipt.Status 
               AND StatusTables = 'sndMoneyReceipt') AS Status,
            (SELECT DISTINCT AppStatusMeans 
             FROM sndApprovals 
             WHERE AppStatus = sndMoneyReceipt.AppStatus 
               AND ApprovalTables = 'sndMoneyReceipt') AS AppStatus,
            FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived,
            (SELECT EmpName 
             FROM sndUsers 
             WHERE UserID = sndMoneyReceipt.ReceivedByUserID) AS LogUserName,
            AppStatus,
            CASE 
                WHEN AppStatus = (SELECT AppStatus 
                                  FROM sndApprovals 
                                  WHERE RoleID IN (SELECT RoleID 
                                                   FROM sndUserRoleMapping 
                                                   WHERE UserID = ?) 
                                    AND ApprovalTables = 'sndMoneyReceipt' 
                                    AND AppStatusMeans = 'Checked By') 
                  AND (SELECT RegionID 
                       FROM sndPartyMaster 
                       WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
                  IN (SELECT AreaID 
                      FROM sndMapEmpRegionRegionView 
                      WHERE UserID = ?)
                THEN 'Checked' 
                ELSE 'Not Checked' 
            END AS UserCheckedStatus,
            CASE 
                WHEN AppStatus = (SELECT AppStatus 
                                  FROM sndApprovals 
                                  WHERE RoleID IN (SELECT RoleID 
                                                   FROM sndUserRoleMapping 
                                                   WHERE UserID = ?) 
                                    AND ApprovalTables = 'sndMoneyReceipt' 
                                    AND AppStatusMeans = 'Authorized By') 
                  AND (SELECT RegionID 
                       FROM sndPartyMaster 
                       WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
                  IN (SELECT AreaID 
                      FROM sndMapEmpRegionRegionView 
                      WHERE UserID = ?)
                THEN 'Authorized' 
                ELSE 'Not Authorized' 
            END AS UserAuthorizedStatus,
            CASE 
                WHEN AppStatus = (SELECT AppStatus 
                                  FROM sndApprovals 
                                  WHERE RoleID IN (SELECT RoleID 
                                                   FROM sndUserRoleMapping 
                                                   WHERE UserID = ?) 
                                    AND ApprovalTables = 'sndMoneyReceipt' 
                                    AND AppStatusMeans = 'Approved By') 
                  AND (SELECT RegionID 
                       FROM sndPartyMaster 
                       WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
                  IN (SELECT DISTINCT AreaID 
                      FROM sndMapEmpRegionRegionView 
                      WHERE UserID = ?)
                THEN 'Approved' 
                ELSE 'Not Approved' 
            END AS UserApprovalStatus
        FROM [dbo].sndMoneyReceipt
       WHERE status in (1,2,3) ORDER BY 
    MRID DESC";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];
    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);

} else {

    $sql = "
        SELECT 
         ROW_NUMBER() OVER (ORDER BY MRID) AS SL, 
    MRID,
    CONCAT(MRNo,' -', 'Tk. ', FORMAT(ISNULL(AmountReceived, 0), 'N2')) as MRInfo1,
    convert(char(11),MRDate,120) as MRInfo2,
     (SELECT PartyName FROM sndPartyMaster WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) as MRInfo3,
            MRNo,
            CONVERT(CHAR(11), MRDate, 120) AS MRDate,
            PartyID,
            (SELECT RegionID 
             FROM sndPartyMaster 
             WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) AS RegionID,
            (SELECT PartyName 
             FROM sndPartyMaster 
             WHERE PartyID = sndMoneyReceipt.PartyID) AS PartyName,
            Status,
            (SELECT StatusMeans 
             FROM sndStatus 
             WHERE Status = sndMoneyReceipt.Status 
               AND StatusTables = 'sndMoneyReceipt') AS Status,
            (SELECT DISTINCT AppStatusMeans 
             FROM sndApprovals 
             WHERE AppStatus = sndMoneyReceipt.AppStatus 
               AND ApprovalTables = 'sndMoneyReceipt') AS AppStatus,
            FORMAT(ISNULL(AmountReceived, 0), 'N2') as AmountReceived,
            (SELECT EmpName 
             FROM sndUsers 
             WHERE UserID = sndMoneyReceipt.ReceivedByUserID) AS LogUserName,
            AppStatus,
            CASE 
                WHEN AppStatus = (SELECT AppStatus 
                                  FROM sndApprovals 
                                  WHERE RoleID IN (SELECT RoleID 
                                                   FROM sndUserRoleMapping 
                                                   WHERE UserID = ?) 
                                    AND ApprovalTables = 'sndMoneyReceipt' 
                                    AND AppStatusMeans = 'Authorized By') 
                  AND (SELECT RegionID 
                       FROM sndPartyMaster 
                       WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
                  IN (SELECT AreaID 
                      FROM sndMapEmpRegionRegionView 
                      WHERE UserID = ?)
                THEN 'Authorized' 
                ELSE 'Not Authorized' 
            END AS UserAuthorizedStatus,
            CASE 
                WHEN AppStatus = (SELECT AppStatus 
                                  FROM sndApprovals 
                                  WHERE RoleID IN (SELECT RoleID 
                                                   FROM sndUserRoleMapping 
                                                   WHERE UserID = ?) 
                                    AND ApprovalTables = 'sndMoneyReceipt' 
                                    AND AppStatusMeans = 'Approved By') 
                  AND (SELECT RegionID 
                       FROM sndPartyMaster 
                       WHERE sndPartyMaster.PartyID = sndMoneyReceipt.PartyID) 
                  IN (SELECT DISTINCT AreaID 
                      FROM sndMapEmpRegionRegionView 
                      WHERE UserID = ?)
                THEN 'Approved' 
                ELSE 'Not Approved' 
            END AS UserApprovalStatus
        FROM [dbo].sndMoneyReceipt
       WHERE 
    
Status =2 and ((SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) in (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndMoneyReceipt' AND AppStatus = sndMoneyReceipt.Status)
and (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) ='15')
OR 	Status = 3 and ((SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) in (SELECT RoleID FROM sndApprovals WHERE ApprovalTables = 'sndMoneyReceipt' AND AppStatus = sndMoneyReceipt.Status)
and (SELECT RoleID FROM sndUserRoleMapping WHERE UserID = ?) ='16')

ORDER BY 
    MRID DESC";

    // Bind the UserID parameter for all placeholders
    $params = [$UserID, $UserID, $UserID, $UserID, $UserID, $UserID,$UserID, $UserID, $UserID, $UserID, $UserID, $UserID];
    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, $params);


}

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching data.", "details" => sqlsrv_errors()]);
        return;
    }

    // Fetch the results
    $receipts = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $receipts[] = $row;
    }

    // Return the results as JSON
    echo json_encode($receipts);
}


function generate_new_money_receipt_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "MR";

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
        if (isset($row['MRNo']) && preg_match('/MR-(\d+)\/\d{2}-\d{2}/', $row['MRNo'], $matches)) {
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
    $sqlLastOrder = "SELECT TOP 1 SalesOrderNo FROM sndSalesOrders where OrderTypeID = 1 ORDER BY CreatedAt DESC";
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

function generate_new_SpecimenOrder_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "SPO";

    // Query to fetch the latest SalesOrderNo
    $sqlLastOrder = "SELECT TOP 1 SalesOrderNo FROM sndSalesOrders where OrderTypeID = 2 ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last sales order number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['SalesOrderNo']) && preg_match('/SPO-(\d+)\/\d{2}-\d{2}/', $row['SalesOrderNo'], $matches)) {
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
        if (isset($row['ChallanNo']) && preg_match('/CN-(\d+)\/\d{2}-\d{2}/', $row['ChallanNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next sales order number
    $nextNumber = $lastNumber + 1;
    $newChallanNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated sales order number
    echo json_encode(["NewChallanNo" => $newChallanNo]);
}

function generate_new_invoice_number($conn) {
    // Set prefix and date components
    $currentMonth = date('m'); // e.g., 11 for November
    $currentYear = date('y');  // e.g., 24 for 2024
    $prefix = "INV";

    // Query to fetch the latest SalesOrderNo
    $sqlLastOrder = "SELECT TOP 1 InvoiceNo FROM sndInvoiceMaster ORDER BY CreatedAt DESC";
    $stmtLastOrder = sqlsrv_query($conn, $sqlLastOrder);

    if ($stmtLastOrder === false) {
        echo json_encode(["error" => "Error fetching last sales order number: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Initialize the starting number
    $lastNumber = 1000;

    // Check if a previous record exists and extract its numeric part
    if ($row = sqlsrv_fetch_array($stmtLastOrder, SQLSRV_FETCH_ASSOC)) {
        if (isset($row['InvoiceNo']) && preg_match('/INV-(\d+)\/\d{2}-\d{2}/', $row['InvoiceNo'], $matches)) {
            $lastNumber = (int)$matches[1];
        }
    }

    // Generate the next sales order number
    $nextNumber = $lastNumber + 1;
    $newInvoiceNo = sprintf("%s-%04d/%02d-%02d", $prefix, $nextNumber, $currentMonth, $currentYear);

    // Return the newly generated sales order number
    echo json_encode(["newInvoiceNo" => $newInvoiceNo]);
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

function get_Returnall($conn, $ProductReturnID) {
    // Check if ProductReturnID is provided
    if (!isset($_GET['ProductReturnID']) || empty($_GET['ProductReturnID'])) {
        echo json_encode(["error" => "Missing ProductReturnID"]);
        return;
    }

    // Retrieve ProductReturnID from the request
    $ProductReturnID = $_GET['ProductReturnID'];

    try {
        // Construct base URL
        $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);

        // Query to fetch product receipt details
        $sqlReceipt = "
            SELECT
                pr.ProductReturnNo,
                CONVERT(char(11), pr.ReturnDate, 120) as ReturnDate,
                pr.PartyID,
                bp.PartyName,
                FORMAT(ISNULL(pr.TotalAmount, 0), 'N2') as TotalAmount,
                pr.Inword,
                bp.Address,
                bp.ContactNumber,
                pr.UserID,
                u.EmpName AS CreatedBy,
                pr.CreatedAt,
                pr.ModifiedAt,
                pr.ReturnDocPath
            FROM 
                sndProductReturn pr
            LEFT JOIN 
                sndPartyMaster bp ON pr.PartyID = bp.PartyID
            LEFT JOIN 
                sndUserView u ON pr.UserID = u.UserID
            WHERE 
                pr.ProductReturnID = ?";

        $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, [$ProductReturnID]);

        if ($stmtReceipt === false) {
            throw new Exception("Error fetching product receipt: " . print_r(sqlsrv_errors(), true));
        }

        $receipt = sqlsrv_fetch_array($stmtReceipt, SQLSRV_FETCH_ASSOC);

        if (!$receipt) {
            echo json_encode(["error" => "No receipt found for the given ProductReturnID"]);
            return;
        }

        // Append full URL to ReturnDocPath if available
        if (!empty($receipt['ReturnDocPath'])) {
            $receipt['ReturnDocURL'] = rtrim($baseURL, '/') . '/' . ltrim($receipt['ReturnDocPath'], '/');
        } else {
            $receipt['ReturnDocURL'] = null;
        }

        // Query to fetch product return details
        $sqlDetails = "
            SELECT 
                ROW_NUMBER() OVER (ORDER BY prd.ProductReturnDetailsID) AS SL,
                prd.ProductReturnDetailsID,
                p.ProductName as PRDInfo1,
                (SELECT CategoryName FROM sndCategorydata WHERE ID = prd.ProductCategoryID) as PRDInfo2,
                CONCAT(prd.Quantity, ' @ ', prd.Rate, 'Tk. ', prd.Total) as PRDInfo3,
                prd.ProductReturnID,
                prd.FinancialYearID,
                (SELECT Name FROM CmnTransactionalYears WHERE id = prd.FinancialYearID AND CmnCompanyId = 2) AS FinancialYearName,
                prd.ProductCategoryID,
                (SELECT CategoryName FROM sndCategorydata WHERE ID = prd.ProductCategoryID) AS ProductCategoryName,
                prd.ProductID,
                p.ProductName,
                prd.Quantity,
                prd.Rate,
                prd.Total,
                CONCAT(prd.Quantity, ' Pcs', ' @ Tk. ', prd.Rate, ' = ', prd.Total) AS RateValue
            FROM 
                sndProductReturnDetails prd
            LEFT JOIN 
                sndProducts p ON prd.ProductID = p.ProductID
            WHERE 
                prd.ProductReturnID = ?";

        $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$ProductReturnID]);

        if ($stmtDetails === false) {
            throw new Exception("Error fetching product receipt details: " . print_r(sqlsrv_errors(), true));
        }

        $details = [];
        while ($row = sqlsrv_fetch_array($stmtDetails, SQLSRV_FETCH_ASSOC)) {
            $details[] = $row;
        }

        // Final combined response
        echo json_encode([
            "success" => true,
            "receipt" => $receipt,
            "details" => $details
        ], JSON_PRETTY_PRINT);

    } catch (Exception $e) {
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}


function get_Returnall1($conn,$ProductReturnID) {
    // Check if ProductReturnID is provided
    if (!isset($_GET['ProductReturnID']) || empty($_GET['ProductReturnID'])) {
        echo json_encode(["error" => "Missing ProductReturnID"]);
        return;
    }

    // Retrieve ProductReturnID from the request
    $ProductReturnID = $_GET['ProductReturnID'];

    try {
        // Query to fetch product receipt details
        $sqlReceipt = "
            SELECT
                pr.ProductReturnNo,
				convert(char(11),pr.ReturnDate,120) as ReturnDate,
                pr.PartyID,
                bp.PartyName,
				FORMAT(ISNULL(pr.TotalAmount, 0), 'N2') as TotalAmount,
				pr.Inword,
                bp.Address,
                bp.ContactNumber,
                pr.UserID,
                u.EmpName AS CreatedBy,
                pr.CreatedAt,
                pr.ModifiedAt
            FROM 
                sndProductReturn pr
            LEFT JOIN 
                sndPartyMaster bp ON pr.PartyID = bp.PartyID
            LEFT JOIN 
                sndUserView u ON pr.UserID = u.UserID
            WHERE 
                pr.ProductReturnID = ?";

        // Prepare and execute the main receipt query
        $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, [$ProductReturnID]);

        if ($stmtReceipt === false) {
            throw new Exception("Error fetching product receipt: " . print_r(sqlsrv_errors(), true));
        }

        $receipt = sqlsrv_fetch_array($stmtReceipt, SQLSRV_FETCH_ASSOC);

        if (!$receipt) {
            echo json_encode(["error" => "No receipt found for the given ProductReturnID"]);
            return;
        }


        // Query to fetch receipt details   FORMAT(ISNULL(prd.Quantity, 0), 'N2') as Quantity,
        $sqlDetails = "
            SELECT ROW_NUMBER() OVER (ORDER BY  prd.ProductReturnDetailsID) AS SL,
			 prd.ProductReturnDetailsID,
              p.ProductName as PRDInfo1,
             (SELECT CategoryName FROM sndCategorydata WHERE ID = prd.ProductCategoryID) as PRDInfo2,

              CONCAT(prd.Quantity,' @ ',prd.Rate, 'Tk. ', prd.Total) as PRDInfo3,
                prd.ProductReturnID,
                prd.FinancialYearID,
                (select Name from CmnTransactionalYears where CmnTransactionalYears.id =prd.FinancialYearID and CmnCompanyId = 2)
                as FinancialYearName,
                prd.ProductCategoryID,
				(SELECT CategoryName FROM sndCategorydata WHERE ID = prd.ProductCategoryID) AS ProductCategoryName,
                prd.ProductID,
                p.ProductName,
                prd.Quantity,
                prd.Rate,
                prd.Total,
				CONCAT(prd.Quantity,' Pcs', ' @ Tk. ', prd.Rate, ' = ', prd.Total) AS RateValue -- Corrected calculation
            FROM 
                sndProductReturnDetails prd
            LEFT JOIN 
                sndProducts p ON prd.ProductID = p.ProductID
            WHERE 
                prd.ProductReturnID = ?";

        // Prepare and execute the receipt details query
        $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$ProductReturnID]);

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



function get_ppreceiptall($conn,$ProductReceiptID) {
    // Check if ProductReceiptID is provided
    if (!isset($_GET['ProductReceiptID']) || empty($_GET['ProductReceiptID'])) {
        echo json_encode(["error" => "Missing ProductReceiptID"]);
        return;
    }

    // Retrieve ProductReceiptID from the request
    $ProductReceiptID = $_GET['ProductReceiptID'];

    // Define the base URL for the ChallanCopyPath
    $baseURL = "http://192.168.88.116/ABPolymer/uploads/ChallanCopyPath/";

    try {
        // Query to fetch product receipt details
        $sqlReceipt = "
            SELECT 
                pr.ProductReceiptNo,
				convert(char(11),pr.ReceiptDate,120) as ReceiptDate,
                pr.BindingPartyID,
                bp.PartyName AS BindingPartyName,
                bp.Address,
                bp.ContactNumber,
                pr.ChallanNumber,
                pr.ChallanCopyPath,
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

        // Query to fetch receipt details   FORMAT(ISNULL(prd.Quantity, 0), 'N2') as Quantity,
        $sqlDetails = "
            SELECT ROW_NUMBER() OVER (ORDER BY  prd.ProductReceiptDetailsID) AS SL,
			 prd.ProductReceiptDetailsID,
                prd.ProductReceiptID,
                prd.FinancialYearID,
                (select Name from CmnTransactionalYears where CmnTransactionalYears.id =prd.FinancialYearID and CmnCompanyId = 2)
                as FinancialYearName,
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
     ROW_NUMBER() OVER (ORDER BY  pr.ProductReceiptID) AS SL, 
                pr.ProductReceiptID,
                pr.ProductReceiptNo, 
                CONVERT(CHAR(11), pr.ReceiptDate, 120) AS ReceiptDate,
                pr.BindingPartyID, 
                pb.PartyName AS BindingPartyName,
                pr.ChallanNumber,
                pr.ChallanCopyPath,
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
                PrdBindingParty pb ON pr.BindingPartyID = pb.BindingPartyID order by pr.ProductReceiptID desc";

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

function get_PTransfers($conn) {
    $sql = "
SELECT 
     ROW_NUMBER() OVER (ORDER BY  pr.ProductTransferID) AS SL, 
                pr.ProductTransferID,
                pr.ProductTransferNo, 
                pr.ProductTransferNo AS PTInfo1,
                CONVERT(CHAR(11), pr.TransferDate, 120) AS PTInfo2,
                pb.PartyName AS PTInfo3,
                pbT.PartyName AS PTInfo4,
                CONVERT(CHAR(11), pr.TransferDate, 120) AS TransferDate,
                pr.partyFromid, 
                pb.PartyName as FromPartyName,
				pr.partyToid, 
                pbT.PartyName as ToPartyName,
				FORMAT(ISNULL(TotalAmount, 0), 'N2') as TotalAmount,
				dbo.fnNumberToWords(TotalAmount) as InWord,
				 CASE 
        WHEN (SELECT COUNT(*) 
              FROM sndProductTransferDetails 
              WHERE sndProductTransferDetails.ProductTransferID = pr.ProductTransferID) = 0 
        THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus
            FROM  
                sndProductTransfer pr
            LEFT JOIN 
                sndPartyMaster pb ON pr.PartyFromID = pb.PartyID 
			LEFT JOIN 
                sndPartyMaster pbT ON pr.PartyToID = pbT.PartyID	
				order by pr.ProductTransferID desc";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching Transfers: " . print_r(sqlsrv_errors(), true)]);
        Transfer;
    }

    $Transfers = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Modify ChallanCopyPath to include the public URL
        if (!empty($row['ProductTransferID'])) {
            $row['ProductTransferID'] = $row['ProductTransferID'];
        }

        $Transfers[] = $row;
    }

    echo json_encode($Transfers);
}


function get_Transferall($conn,$ProductTransferID) {
    // Check if ProductTransferID is provided
    if (!isset($_GET['ProductTransferID']) || empty($_GET['ProductTransferID'])) {
        echo json_encode(["error" => "Missing ProductTransferID"]);
        Transfer;
    }

    // Retrieve ProductTransferID from the request
    $ProductTransferID = $_GET['ProductTransferID'];

    try {
        // Query to fetch product receipt details
        $sqlReceipt = "
            SELECT
                pr.ProductTransferNo,
				convert(char(11),pr.TransferDate,120) as TransferDate,
                pr.PartyFromID,
                bp.PartyName as FromPartyName,
				pr.partyToid, 
                pbT.PartyName as ToPartyName,
				FORMAT(ISNULL(pr.TotalAmount, 0), 'N2') as TotalAmount,
				dbo.fnNumberToWords(TotalAmount) as InWord,
                bp.Address,
                bp.ContactNumber,
                pr.UserID,
                u.EmpName AS CreatedBy,
                u.Designation,
                pr.CreatedAt,
                pr.ModifiedAt
            FROM 
                sndProductTransfer pr
            LEFT JOIN 
                sndPartyMaster bp ON pr.PartyFromID = bp.PartyID
			LEFT JOIN 
                sndPartyMaster pbT ON pr.PartyToID = pbT.PartyID	
            LEFT JOIN 
                sndUserView u ON pr.UserID = u.UserID
            WHERE 
                pr.ProductTransferID = ?";

        // Prepare and execute the main receipt query
        $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, [$ProductTransferID]);

        if ($stmtReceipt === false) {
            throw new Exception("Error fetching product receipt: " . print_r(sqlsrv_errors(), true));
        }

        $receipt = sqlsrv_fetch_array($stmtReceipt, SQLSRV_FETCH_ASSOC);

        if (!$receipt) {
            echo json_encode(["error" => "No receipt found for the given ProductTransferID"]);
            Transfer;
        }


        // Query to fetch receipt details   FORMAT(ISNULL(prd.Quantity, 0), 'N2') as Quantity,
        $sqlDetails = "
            SELECT ROW_NUMBER() OVER (ORDER BY  prd.ProductTransferDetailsID) AS SL,
			 prd.ProductTransferDetailsID,
                prd.ProductTransferID,
                prd.FinancialYearID,
                (select Name from CmnTransactionalYears where CmnTransactionalYears.id =prd.FinancialYearID and CmnCompanyId = 2)
                as FinancialYearName,
                prd.ProductCategoryID,
				(SELECT CategoryName FROM sndCategorydata WHERE ID = prd.ProductCategoryID) AS ProductCategoryName,
                prd.ProductID,
                p.ProductName,
                prd.Quantity,
                prd.Rate,
                prd.Total,
				CONCAT(prd.Quantity,' Pcs', ' @ Tk. ', prd.Rate, ' = ', prd.Total) AS RateValue -- Corrected calculation
            FROM 
                sndProductTransferDetails prd
            LEFT JOIN 
                sndProducts p ON prd.ProductID = p.ProductID
            WHERE 
                prd.ProductTransferID = ?";

        // Prepare and execute the receipt details query
        $stmtDetails = sqlsrv_query($conn, $sqlDetails, [$ProductTransferID]);

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
        // Handle errors and Transfer error response
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]);
    }
}


// Function to get all preturns
// Function to get all preturns
function get_PReturns($conn) {
    $sql = "SELECT 
     ROW_NUMBER() OVER (ORDER BY  pr.ProductReturnID) AS SL, 
                pr.ProductReturnNo as PRInfo1,
               CONVERT(CHAR(11), pr.ReturnDate, 120) as PRInfo2,
                pb.PartyName as PRInfo3,
                pr.ProductReturnID,
                pr.ProductReturnNo, 
                CONVERT(CHAR(11), pr.ReturnDate, 120) AS ReturnDate,
                pr.partyid, 
                pb.PartyName,
				 CASE 
        WHEN (SELECT COUNT(*) 
              FROM sndProductReturnDetails 
              WHERE sndProductReturnDetails.ProductReturnID = pr.ProductReturnID) = 0 
        THEN 'False' 
        ELSE 'True' 
    END AS DetailsStatus
            FROM 
                sndProductReturn pr
            LEFT JOIN 
                sndPartyMaster pb ON pr.PartyID = pb.PartyID order by pr.ProductReturnID desc";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching returns: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $returns = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Modify ChallanCopyPath to include the public URL
        if (!empty($row['ProductReturnID'])) {
            $row['ProductReturnID'] = $row['ProductReturnID'];
        }

        $returns[] = $row;
    }

    echo json_encode($returns);
}

// Function to get a single receipt by ID
function get_preceipt($conn, $ProductReceiptID) {
    $sql = "SELECT 
        pr.ProductReceiptNo, 
        convert(char(11),pr.ReceiptDate,120) ReceiptDate,
        pr.BindingPartyID, 
        pb.PartyName AS BindingPartyName,
       
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
            $baseUrl = "http://192.168.88.116/ABPolymer/";
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
            $baseUrl = "http://192.168.88.116/ABPolymer/";
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

function get_PReturn($conn, $ProductReturnID) {
    if (!$ProductReturnID) {
        echo json_encode(["error" => "Missing required field: ProductReturnID"]);
        return;
    }

    // Query to fetch product return details
    $sql = "SELECT 
                pr.ProductReturnID,
                pr.ProductReturnNo, 
                CONVERT(CHAR(11), pr.ReturnDate, 120) AS ReturnDate,
                pr.PartyID, 
                pb.PartyName,
                CASE 
                    WHEN EXISTS (
                        SELECT 1 
                        FROM sndProductReturnDetails 
                        WHERE sndProductReturnDetails.ProductReturnID = pr.ProductReturnID
                    ) 
                    THEN 'True' 
                    ELSE 'False' 
                END AS DetailsStatus
            FROM sndProductReturn pr
            LEFT JOIN sndPartyMaster pb ON pr.PartyID = pb.PartyID
            WHERE pr.ProductReturnID = ?";

    // Execute the query
    $stmt = sqlsrv_query($conn, $sql, [$ProductReturnID]);

    if ($stmt === false) {
        echo json_encode(["error" => "Error fetching product return: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    $return = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if (!$return) {
        echo json_encode(["error" => "No product return found for the provided ProductReturnID"]);
        return;
    }

    // Return the result as JSON
    echo json_encode($return);
}

// Function to create a receipt
function create_preceipt1($conn) {
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
           ProductReceiptNo, ReceiptDate, BindingPartyID, 
           FinancialYearID, ProductCategoryID, ProductID, Quantity, 
           Rate, ChallanNumber, ChallanCopyPath,  
           UserID, CreatedAt) 
           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, GETDATE())";

    $params = [
        $data['ProductReceiptNo'],
        $data['ReceiptDate'],
        $data['BindingPartyID'],
        $data['FinancialYearID'] ?? null,
        $data['ProductCategoryID'] ?? null,
        $data['ProductID'] ?? null,
        $data['Quantity'] ?? null,
        $data['Rate'] ?? null,
        $data['ChallanNumber'],
        $targetFilePath,
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
function create_preceipt($conn) {
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
        $fileURL = null;

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
            $fileURL = "http://192.168.88.116/ABPolymer/uploads/ChallanCopyPath/" . $fileName;
        } else {
            throw new Exception("ChallanCopyPath is missing or invalid");
        }

        // SQL query to insert data into the database
        $sql = "INSERT INTO sndProductReceipt (
                   ProductReceiptNo, ReceiptDate, BindingPartyID, 
                   ChallanNumber, ChallanCopyPath,  
                   UserID, CreatedAt
               ) OUTPUT INSERTED.ProductReceiptID
               VALUES (?, ?, ?, ?, ?, ?, GETDATE())";

        // Prepare parameters
        $params = [
            $data['ProductReceiptNo'],
            $data['ReceiptDate'],
            $data['BindingPartyID'],
            $data['ChallanNumber'],
            $fileURL, // Use the file URL instead of the local path
            $data['UserID'] ?? NULL, // Ensure UserID is passed as NULL if not provided
        ];

        // Execute the query
        $stmt = sqlsrv_query($conn, $sql, $params);

        // Check for errors during query execution
        if ($stmt === false) {
            throw new Exception("Error creating product receipt: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the ProductReceiptID
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$row || !isset($row['ProductReceiptID'])) {
            throw new Exception("Failed to fetch ProductReceiptID");
        }

        $ProductReceiptID = $row['ProductReceiptID'];

        // Return success response
        echo json_encode([
            "message" => "Product receipt created successfully",
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


function create_ppreceiptall433($conn) {
    // Validate required fields
    if (
        empty($_POST['ProductReceiptNo']) ||
        empty($_POST['ReceiptDate']) ||
        empty($_POST['BindingPartyID']) ||
        empty($_POST['UserID']) ||
        empty($_POST['Details']) ||
        !is_array($_POST['Details'])
    ) {
        echo json_encode(["error" => "Missing required fields or invalid details format"]);
        return;
    }

    // Initialize variables
    $challanCopyPath = null;
    $totalAmount = 0;

    // Handle file upload for ChallanCopyPath (if provided)
    if (isset($_FILES['ChallanCopyPath']) && $_FILES['ChallanCopyPath']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/ChallanCopyPath/";
        $fileName = uniqid("Challan_", true) . "." . pathinfo($_FILES['ChallanCopyPath']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        // Ensure directory exists
        if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
            echo json_encode(["error" => "Failed to create upload directory"]);
            return;
        }

        // Move the uploaded file
        if (!move_uploaded_file($_FILES['ChallanCopyPath']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving Challan Copy"]);
            return;
        }

        // Set the relative path to save in the database
        $challanCopyPath = 'http://192.168.88.116/ABPolymer/uploads/ChallanCopyPath/' . $fileName;
    }

    // Start transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Insert into sndProductReceipt
        $sqlReceipt = "
            INSERT INTO [dbo].[sndProductReceipt]
                ([ProductReceiptNo], [ReceiptDate], [BindingPartyID], 
                 [ChallanNumber], [ChallanCopyPath], [TotalAmount], 
                 [UserID], [CreatedAt], [ModifiedAt])
            OUTPUT INSERTED.ProductReceiptID
            VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE());
        ";

        // Prepare parameters
        $paramsReceipt = [
            $_POST['ProductReceiptNo'],
            $_POST['ReceiptDate'],
            $_POST['BindingPartyID'],
            $_POST['ChallanNumber'] ?? null,
            $challanCopyPath,
            0, // Placeholder for TotalAmount
            $_POST['UserID']
        ];

        // Execute query
        $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, $paramsReceipt);
        if ($stmtReceipt === false) {
            throw new Exception("Error inserting product receipt: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch ProductReceiptID
        $row = sqlsrv_fetch_array($stmtReceipt, SQLSRV_FETCH_ASSOC);
        $ProductReceiptID = $row['ProductReceiptID'] ?? null;
        if (is_null($ProductReceiptID)) {
            throw new Exception("ProductReceiptID is null.");
        }

        // Insert receipt details
        foreach ($_POST['Details'] as $detail) {
            if (
                empty($detail['FinancialYearID']) ||
                empty($detail['ProductCategoryID']) ||
                empty($detail['ProductID']) ||
                empty($detail['Quantity']) ||
                empty($detail['Rate'])
            ) {
                throw new Exception("Missing required fields in Product Receipt Details.");
            }

            $total = $detail['Quantity'] * $detail['Rate'];
            $totalAmount += $total; // Calculate total amount

            $detailSql = "
                INSERT INTO [dbo].[sndProductReceiptDetails]
                    ([ProductReceiptID], [FinancialYearID], [ProductCategoryID], 
                    [ProductID], [Quantity], [Rate], [Total], [status])
                VALUES (?, ?, ?, ?, ?, ?, ?, ?);
            ";

            $detailParams = [
                $ProductReceiptID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Rate'],
                $total,
                1 // Active status
            ];

            $detailStmt = sqlsrv_query($conn, $detailSql, $detailParams);
            if ($detailStmt === false) {
                throw new Exception("Error inserting product receipt details: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Update TotalAmount in sndProductReceipt
        $updateTotalSQL = "UPDATE [dbo].[sndProductReceipt] SET TotalAmount = ? WHERE ProductReceiptID = ?";
        $updateTotalParams = [$totalAmount, $ProductReceiptID];

        $updateStmt = sqlsrv_query($conn, $updateTotalSQL, $updateTotalParams);
        if ($updateStmt === false) {
            throw new Exception("Error updating total amount: " . print_r(sqlsrv_errors(), true));
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Product receipt and details created successfully",
            "ProductReceiptID" => $ProductReceiptID,
            "TotalAmount" => $totalAmount,
            "ChallanCopyPath" => $challanCopyPath
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}



function create_ppreceiptall($conn) {
    // Validate required fields
    if (
        empty($_POST['ProductReceiptNo']) || 
        empty($_POST['ReceiptDate']) || 
        empty($_POST['BindingPartyID']) || 
        empty($_POST['UserID'])
    ) {
        echo json_encode(["error" => "Missing required fields"]);
        return;
    }

    // Initialize variables
    $challanCopyPath = null;
    $totalAmount = 0; // Total amount for sndProductReceipt

    // Handle file upload for ChallanCopyPath
    if (isset($_FILES['ChallanCopyPath']) && $_FILES['ChallanCopyPath']['error'] === UPLOAD_ERR_OK) {
        $targetDir = __DIR__ . "/uploads/ChallanCopyPath/";
        $fileName = uniqid("Challan_", true) . "." . pathinfo($_FILES['ChallanCopyPath']['name'], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;

        if (!is_dir($targetDir) && !mkdir($targetDir, 0755, true) && !is_dir($targetDir)) {
            echo json_encode(["error" => "Failed to create directory for file upload"]);
            return;
        }

        if (!move_uploaded_file($_FILES['ChallanCopyPath']['tmp_name'], $targetFilePath)) {
            echo json_encode(["error" => "Error saving Challan Copy"]);
            return;
        }

        $challanCopyPath = 'http://192.168.88.116/ABPolymer/uploads/ChallanCopyPath/' . $fileName;
    }

    // Begin transaction
    sqlsrv_begin_transaction($conn);

    try {
        // SQL query to insert the receipt data
        $sqlReceipt = "
            INSERT INTO [dbo].[sndProductReceipt]
                ([ProductReceiptNo], [ReceiptDate], [BindingPartyID], 
                [ChallanNumber], [ChallanCopyPath], [TotalAmount], 
                [UserID], [CreatedAt], [ModifiedAt])
            OUTPUT INSERTED.ProductReceiptID
            VALUES (?, ?, ?, ?, ?, ?, ?, GETDATE(), GETDATE());
        ";

        // Prepare input data
        $paramsReceipt = [
            $_POST['ProductReceiptNo'],
            $_POST['ReceiptDate'],
            $_POST['BindingPartyID'],
            $_POST['ChallanNumber'] ?? null,
            $challanCopyPath,
            0, // Placeholder for TotalAmount
            $_POST['UserID']
        ];

        // Execute the query
        $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, $paramsReceipt);

        if ($stmtReceipt === false) {
            throw new Exception("Error creating product receipt: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch the inserted ProductReceiptID
        sqlsrv_fetch($stmtReceipt);
        $ProductReceiptID = sqlsrv_get_field($stmtReceipt, 0);

        if (is_null($ProductReceiptID)) {
            throw new Exception("ProductReceiptID is null. Check if the insert was successful.");
        }

        // Insert receipt details if provided
        if (isset($_POST['Details']) && is_array($_POST['Details']) && !empty($_POST['Details'])) {
            foreach ($_POST['Details'] as $detail) {
                if (
                    empty($detail['FinancialYearID']) || 
                    empty($detail['ProductCategoryID']) || 
                    empty($detail['ProductID']) || 
                    empty($detail['Quantity']) || 
                    empty($detail['Rate'])
                ) {
                    continue;
                }

                // Calculate total for this detail
                $total = $detail['Quantity'] * $detail['Rate'];
                $totalAmount += $total; // Sum total amount for receipt

                $detailSql = "
                    INSERT INTO [dbo].[sndProductReceiptDetails]
                        ([ProductReceiptID], [FinancialYearID], [ProductCategoryID], 
                        [ProductID], [Quantity], [Rate], [Total], [status])
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?);
                ";

                $detailParams = [
                    $ProductReceiptID,
                    $detail['FinancialYearID'],
                    $detail['ProductCategoryID'],
                    $detail['ProductID'],
                    $detail['Quantity'],
                    $detail['Rate'],
                    $total,
                    1 // Default status
                ];

                $detailStmt = sqlsrv_query($conn, $detailSql, $detailParams);

                if ($detailStmt === false) {
                    throw new Exception("Error inserting product receipt details: " . print_r(sqlsrv_errors(), true));
                }
            }

            // Update TotalAmount in sndProductReceipt
            $updateTotalSql = "
                UPDATE [dbo].[sndProductReceipt] 
                SET TotalAmount = ? 
                WHERE ProductReceiptID = ?;
            ";
            $updateTotalParams = [$totalAmount, $ProductReceiptID];
            $updateTotalStmt = sqlsrv_query($conn, $updateTotalSql, $updateTotalParams);

            if ($updateTotalStmt === false) {
                throw new Exception("Error updating total amount: " . print_r(sqlsrv_errors(), true));
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Product receipt and details created successfully",
            "ProductReceiptID" => $ProductReceiptID,
            "TotalAmount" => $totalAmount,
            "ChallanCopyPath" => $challanCopyPath
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}



function create_ppreceiptall3322($conn) {
    // Validate required fields
    if (
        empty($_POST['ProductReceiptNo']) || 
        empty($_POST['ReceiptDate']) || 
        empty($_POST['BindingPartyID']) || 
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
        $challanCopyPath = 'http://192.168.88.116/ABPolymer/uploads/ChallanCopyPath/' . $fileName;
    }

    // SQL query to insert the receipt data
    $sqlReceipt = "
        INSERT INTO [dbo].[sndProductReceipt]
            ([ProductReceiptNo], [ReceiptDate], [BindingPartyID], 
            [ChallanNumber], [ChallanCopyPath], 
             [UserID], [CreatedAt])
        OUTPUT INSERTED.ProductReceiptID
        VALUES (?, ?, ?, ?, ?, ?, GETDATE());
    ";

    // Prepare input data
    $paramsReceipt = [
        $_POST['ProductReceiptNo'],
        $_POST['ReceiptDate'],
        $_POST['BindingPartyID'],
        $_POST['ChallanNumber'] ?? null,
        $challanCopyPath,
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

function update_PReturnall($conn, $ProductReturnID) {
    // Decode JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    // Validate required fields for Product Return Master
    if (
        empty($ProductReturnID) ||
        empty($input['ProductReturnNo']) ||
        empty($input['ReturnDate']) ||
        empty($input['PartyID']) ||
        empty($input['TotalAmount']) ||
        !isset($input['InWord']) ||
        !isset($input['UserID'])
    ) {
        echo json_encode(["error" => "Missing required fields in Product Return."]);
        return;
    }

    // Start Transaction
    sqlsrv_begin_transaction($conn);

    try {
        // Update `sndProductReturn`
        $updateMasterSQL = "UPDATE sndProductReturn 
                            SET ProductReturnNo = ?, 
                                ReturnDate = ?, 
                                PartyID = ?, 
                                TotalAmount = ?, 
                                InWord = ?, 
                                UserID = ?, 
                                UpdatedAt = GETDATE()
                            WHERE ProductReturnID = ?";

        $paramsMaster = [
            $input['ProductReturnNo'],
            $input['ReturnDate'],
            $input['PartyID'],
            $input['TotalAmount'],
            $input['InWord'],
            $input['UserID'],
            $ProductReturnID
        ];

        $stmtMaster = sqlsrv_query($conn, $updateMasterSQL, $paramsMaster);
        if ($stmtMaster === false) {
            throw new Exception("Error updating Product Return: " . print_r(sqlsrv_errors(), true));
        }

        // Remove existing details for the given ProductReturnID
        $deleteDetailsSQL = "DELETE FROM sndProductReturnDetails WHERE ProductReturnID = ?";
        $stmtDelete = sqlsrv_query($conn, $deleteDetailsSQL, [$ProductReturnID]);
        if ($stmtDelete === false) {
            throw new Exception("Error deleting old Product Return details: " . print_r(sqlsrv_errors(), true));
        }

        // Insert new details if provided
        if (!empty($input['Details']) && is_array($input['Details'])) {
            foreach ($input['Details'] as $detail) {
                if (
                    empty($detail['FinancialYearID']) ||
                    empty($detail['ProductCategoryID']) ||
                    empty($detail['ProductID']) ||
                    !isset($detail['Quantity']) ||
                    !isset($detail['Rate']) ||
                    !isset($detail['Total'])
                ) {
                    throw new Exception("Missing required fields in Product Return details.");
                }

                // Insert into `sndProductReturnDetails`
                $insertDetailSQL = "INSERT INTO sndProductReturnDetails (
                                        ProductReturnID, FinancialYearID, ProductCategoryID,
                                        ProductID, Quantity, Rate, Total
                                    ) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)";

                $paramsDetail = [
                    $ProductReturnID,
                    $detail['FinancialYearID'],
                    $detail['ProductCategoryID'],
                    $detail['ProductID'],
                    $detail['Quantity'],
                    $detail['Rate'],
                    $detail['Total']
                ];

                $stmtDetail = sqlsrv_query($conn, $insertDetailSQL, $paramsDetail);
                if ($stmtDetail === false) {
                    throw new Exception("Error inserting Product Return details: " . print_r(sqlsrv_errors(), true));
                }
            }
        }

        // Commit transaction
        sqlsrv_commit($conn);

        // Return success response
        echo json_encode([
            "message" => "Product Return and details updated successfully",
            "ProductReturnID" => $ProductReturnID
        ]);
    } catch (Exception $e) {
        sqlsrv_rollback($conn);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function update_ppreceiptall($conn, $ProductReceiptID) {
    // Validate required fields
    $data = json_decode(file_get_contents("php://input"), true);

    if (
        empty($ProductReceiptID) ||
        empty($data['ProductReceiptNo']) ||
        empty($data['ReceiptDate']) ||
        empty($data['BindingPartyID']) ||
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
            [ChallanNumber] = ?,
            [ModifiedAt] = GETDATE()
        WHERE [ProductReceiptID] = ?;
    ";

    // Prepare input data
    $paramsReceipt = [
        $data['ProductReceiptNo'],
        $data['ReceiptDate'],
        $data['BindingPartyID'],
        $data['ChallanNumber'] ?? null,
        $ProductReceiptID
    ];

    // Execute the query
    $stmtReceipt = sqlsrv_query($conn, $sqlReceipt, $paramsReceipt);

    // Check if the query executed successfully
    if ($stmtReceipt === false) {
        echo json_encode(["error" => "Error updating product receipt: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Delete existing details for the given ProductReceiptID
    $deleteSql = "DELETE FROM [dbo].[sndProductReceiptDetails] WHERE [ProductReceiptID] = ?";
    $deleteParams = [$ProductReceiptID];
    $deleteStmt = sqlsrv_query($conn, $deleteSql, $deleteParams);

    if ($deleteStmt === false) {
        echo json_encode(["error" => "Error deleting product receipt details: " . print_r(sqlsrv_errors(), true)]);
        return;
    }

    // Insert new details if provided
    if (isset($data['Details']) && is_array($data['Details']) && !empty($data['Details'])) {
        foreach ($data['Details'] as $detail) {
            // Validate required fields
            if (
                empty($detail['FinancialYearID']) || 
                empty($detail['ProductCategoryID']) || 
                empty($detail['ProductID']) || 
                empty($detail['Quantity']) || 
                empty($detail['Rate'])
            ) {
                continue; // Skip if required fields are missing
            }

            $insertSql = "
                INSERT INTO [dbo].[sndProductReceiptDetails] 
                ([ProductReceiptID], [FinancialYearID], [ProductCategoryID], [ProductID], [Quantity], [Rate], [Total]) 
                VALUES (?, ?, ?, ?, ?, ?, ?);
            ";

            $insertParams = [
                $ProductReceiptID,
                $detail['FinancialYearID'],
                $detail['ProductCategoryID'],
                $detail['ProductID'],
                $detail['Quantity'],
                $detail['Rate'],
                $detail['Quantity'] * $detail['Rate'] // Calculate Total
            ];

            $insertStmt = sqlsrv_query($conn, $insertSql, $insertParams);

            // Log errors for insert
            if ($insertStmt === false) {
                error_log("Error inserting product receipt detail: " . print_r(sqlsrv_errors(), true));
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
