<?php
date_default_timezone_set('Asia/Manila');

class database{

    function opencon(){
        return new PDO('mysql:host=localhost;dbname=paparazzi','root','');
    }

    function insertProducts($product_name, $description, $order_type, $ice_cream, $productImagePath, $pricing_details) {
        try {
            $con = $this->opencon();
            $stmt = $con->prepare("INSERT INTO icecreams (name,  description, order_type, icecream_type, img) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$product_name, $description, $order_type, $ice_cream, $productImagePath]);
            $product_id = $con->lastInsertId();
            foreach ($pricing_details as $pricing) {
                $this->insertPricing($product_id, $pricing['type'], $pricing['name'], $pricing['price']);
            }
            return $product_id;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    function insertPricing($product_id, $type, $name, $price) {
        try {
            $con = $this->opencon();
            $stmt = $con->prepare("INSERT INTO pricing (product_id, type, name, price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$product_id, $type, $name, $price]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    function viewProducts(){
        try {
            $con = $this->opencon();
            $stmt = $con->prepare("SELECT * FROM icecreams");
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }   
    }

    function deleteProduct($product_id){
        try{
            $con = $this->opencon();
            $con->beginTransaction();

            $query = $con->prepare("DELETE FROM icecreams WHERE product_id = ?");
            $query->execute([$product_id]);
            $con->commit();
            return true;

        } catch (PDOException $e) {
            $con->rollBack();
            return false;
        }
    }

    function viewProductsFloats(){
        $con = $this->opencon();
        $stmt = $con->prepare("SELECT 
                                    *, 
                                    i.icecream_type,
                                    CONCAT(REPLACE(SUBSTRING_INDEX(p.name, ' (', 1), 'Float', ''), ' Float') AS product_type,
                                    GROUP_CONCAT(DISTINCT SUBSTRING_INDEX(SUBSTRING_INDEX(p.name, '(', -1), ')', 1) ORDER BY p.name SEPARATOR ' / ') AS sizes,
                                    GROUP_CONCAT(DISTINCT CONCAT('₱', FORMAT(p.price, 2)) ORDER BY p.name SEPARATOR ' - ') AS prices
                                FROM 
                                    icecreams i
                                JOIN 
                                    pricing p ON i.product_id = p.product_id
                                WHERE 
                                    i.icecream_type = 'Floats' 
                                GROUP BY 
                                    product_type
                                ORDER BY 
                                    product_type;
                                ");
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }

    function viewProductsCones(){
        $con = $this->opencon();
        $stmt = $con->prepare("SELECT 
                                    *, 
                                    i.icecream_type,
                                    REPLACE(SUBSTRING_INDEX(p.type, ' (', 1), 'Float', '') AS product_type,  
                                    GROUP_CONCAT(DISTINCT SUBSTRING_INDEX(SUBSTRING_INDEX(p.name, '(', -1), ')', 1) ORDER BY p.name SEPARATOR ' / ') AS sizes,
                                    GROUP_CONCAT(DISTINCT CONCAT('₱', FORMAT(p.price, 2)) ORDER BY p.name SEPARATOR ' - ') AS prices
                                FROM 
                                    icecreams i
                                JOIN 
                                    pricing p ON i.product_id = p.product_id
                                WHERE 
                                    i.icecream_type = 'Cones' 
                                GROUP BY 
                                    product_type
                                ORDER BY 
                                    product_type;");
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }


    function viewProductsCups(){
        $con = $this->opencon();
        $stmt = $con->prepare("SELECT 
                                    *, 
                                    i.icecream_type,
                                    REPLACE(SUBSTRING_INDEX(p.type, ' (', 1), 'Float', '') AS product_type,  
                                    GROUP_CONCAT(DISTINCT SUBSTRING_INDEX(SUBSTRING_INDEX(p.name, '(', -1), ')', 1) ORDER BY p.name SEPARATOR ' / ') AS sizes,
                                    CONCAT('₱', FORMAT(MIN(p.price), 2), ' - ₱', FORMAT(MAX(p.price), 2)) AS prices
                                FROM 
                                    icecreams i
                                JOIN 
                                    pricing p ON i.product_id = p.product_id
                                WHERE 
                                    i.icecream_type = 'Ice Cream in Cup' 
                                GROUP BY 
                                    product_type
                                ORDER BY 
                                    product_type;");
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }


    function addToCart($product_id, $final_product_name, $quantity, $price, $total) {
        $con = $this->opencon(); 
    
        try {
            // Prepare the SQL statement
            $stmt = $con->prepare("INSERT INTO cart 
                    (product_id, product_name, quantity, price, total)
                VALUES 
                    (?,?,?,?,?)
            ");
            // Execute the statements
            $stmt->execute([$product_id, $final_product_name, $quantity, $price, $total]);
            return [
                'success' => true,
                'message' => 'Product successfully added to cart!',
            ];
        } catch (PDOException $e) {
            // Handle errors
            return [
                'success' => false,
                'message' => 'Error adding product to cart: ' . $e->getMessage(),
            ];
        }
    }
    
    

}

?>