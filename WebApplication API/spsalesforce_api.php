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


// Get the request method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : '';


// Database connection
include 'db_connection.php'; // Adjust this to your setup

try {
    // Get parameters
    $action = $_GET['action'] ?? null;
    $designationID = $_GET['DesignationID'] ?? null;

    if ($action === 'get_all_ReportUser' && is_numeric($designationID)) {
        // Prepare and execute stored procedure
        $sql = "exec sndUpperDesignation ?";
        $stmt = sqlsrv_prepare($conn, $sql, [$designationID]);

        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . print_r(sqlsrv_errors(), true));
        }

        if (!sqlsrv_execute($stmt)) {
            throw new Exception("Failed to execute statement: " . print_r(sqlsrv_errors(), true));
        }

        // Fetch results
        $results = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $results[] = $row;
        }

        // Free the statement
        sqlsrv_free_stmt($stmt);

        // Send response
        echo json_encode($results);
        exit;
    } else {
        throw new Exception("Invalid action or missing parameters.");
    }
	
} catch (Exception $e) {
    // Log error
    error_log("Error in API: " . $e->getMessage());

    // Send error response
    echo json_encode(["error" => $e->getMessage()]);
    http_response_code(500); // Internal Server Error
}
