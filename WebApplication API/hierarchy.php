<?php
include_once 'connect.php';
session_start();

// Fetch data from the database
$sql = "SELECT id, name, ShortName, HrmDesignationId FROM HrmDesignations WHERE CmnCompanyId = 2";
//$result = $conn->query($sql);

 $params = [];
 $options = ["Scrollable" => SQLSRV_CURSOR_KEYSET];
 $result = sqlsrv_query($conn, $sql, $params, $options);

// Error handling for the query
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Process the data into a hierarchy array
$designations = [];

 while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {

    $designations[] = $row;
}

// Build a mapping of parent-child relationships
function buildHierarchy($designations, $parentId = NULL) {
    $tree = [];
    foreach ($designations as $designation) {
        if ($designation['HrmDesignationId'] == $parentId) {
            $children = buildHierarchy($designations, $designation['id']);
            if ($children) {
                $designation['children'] = $children;
            }
            $tree[] = $designation;
        }
    }
    return $tree;
}

// Generate the hierarchy tree
$hierarchyTree = buildHierarchy($designations);

// Recursive function to render the hierarchy as HTML
function renderHierarchy($tree) {
    if (empty($tree)) {
        return;
    }
    echo "<ul>";
    foreach ($tree as $node) {
        echo "<li>{$node['name']} ({$node['ShortName']})";
        if (!empty($node['children'])) {
            renderHierarchy($node['children']);
        }
        echo "</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Designation Hierarchy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .hierarchy-container {
            width: 90%;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        ul {
            list-style: none;
            padding-left: 20px;
        }

        li {
            margin: 5px 0;
            font-size: 14px;
            font-weight: bold;
        }

        li ul {
            border-left: 2px solid #ddd;
            padding-left: 15px;
            margin-top: 5px;
        }

        li::before {
            content: "• ";
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>HR Designation Hierarchy</h1>
    <div class="hierarchy-container">
        <?php renderHierarchy($hierarchyTree); ?>
    </div>
</body>
</html>
