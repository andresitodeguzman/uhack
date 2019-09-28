<?php

    $sql_host = "localhost";
    $sql_username = "root";
    $sql_password = "";
    $sql_database = "uhack";
    
    header("Access-Control-Allow-Origin: *");
    
    date_default_timezone_set("Asia/Manila");
    
    $mysqli = new mysqli($sql_host,$sql_username,$sql_password,$sql_database);
    
    
    //require('connection.php');
    function deleteLandlord(Int $id, $mysqli){
        $stmt = $mysqli->prepare("DELETE FROM 'landlord' WHERE 'id' = ? ");
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            //insert_id method is a method that help inserts an id in a row
            $id = $mysqli->insert_id;
            $info = getLandlord($id);
            return array("result"=>True,"message"=>"Deleted landlord","landlord"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function deleteTenant(Int $id, $mysqli){
        $stmt = $mysqli->prepare("DELETE FROM 'tenant' WHERE 'id' = ? ");
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            //insert_id method is a method that help inserts an id in a row
            $id = $mysqli->insert_id;
            $info = getTenant($id);
            return array("result"=>True,"message"=>"Deleted tenant","tenant"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function deleteReceivable(Int $id, $mysqli){
        $stmt = $mysqli->prepare("DELETE FROM 'receivable' WHERE 'id' = ? ");
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            //insert_id method is a method that help inserts an id in a row
            $id = $mysqli->insert_id;
            $info = getReceivable($id);
            return array("result"=>True,"message"=>"Deleted receivable","receivable"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function deleteApartment(Int $id, $mysqli){
        $stmt = $mysqli->prepare("DELETE FROM 'apartment' WHERE 'id' = ? ");
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            //insert_id method is a method that help inserts an id in a row
            $id = $mysqli->insert_id;
            $info = getApartment($id);
            return array("result"=>True,"message"=>"Deleted apartment","apartment"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    //ADD METHODS
    function addLandlord(Array $array, $mysqli){
        $stmt = $mysqli->prepare("INSERT INTO 'landlord' (firstname, lastname,contactnumber,username,password) VALUES (?, ?, ?, ?, ?)");
        $firstname = $array['firstname'];
        $lastname = $array['lastname'];
        $contactnumber = $array['contactnumber'];
        $username = $array['username'];
        $password = $array['password'];
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("sssss",$firstname,$lastname,$contactnumber,$username,$password);
        if($stmt->execute()){
            //insert_id method is a method that help inserts an id in a row
            $id = $mysqli->insert_id;
            $info = getLandlord($id);
            return array("result"=>True,"message"=>"Added landlord","landlord"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function addTenant(Array $array, $mysqli){
        $stmt = $mysqli->prepare("INSERT INTO `tenant` (firstname, lastname,contactnumber,username,`password`) VALUES (?, ?, ?, ?, ?)");
        $firstname = $array['firstname'];
        $lastname = $array['lastname'];
        $contactnumber = $array['contactnumber'];
        $username = $array['username'];
        $password = $array['password'];
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("sssss",$firstname,$lastname,$contactnumber,$username,$password);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getTenant($id);
            return array("result"=>True,"message"=>"Added tenant","tenant"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function addReceivable(Array $array, $mysqli){
        $stmt = $mysqli->query("INSERT INTO 'receivable' (name,repeat,price) VALUES (?, ?, ?)");
        $name = $array['name'];
        $repeat = $array['repeat'];
        $price = $array['price'];
        //bind_param variables of name,shortname,etc.. to mysql insert into landlord
        $stmt->bind_param("sss",$name,$repeat,$price);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getReceivable($id);
            return array("result"=>True,"message"=>"Added receivable","receivable"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function addApartment(Array $array, $mysqli){
        $stmt = $mysqli->query("INSERT INTO 'apartment' (apartmentcode, landlord_id, tenant_id) VALUES (?, ?, ?)");
        $apartmentcode = $array['apartmentcode'];
        $landlord_id = $array['landlord_id'];
        $tenant_id = $array['tenant_id'];
        $stmt->bind_param("sss",$apartmentcode,$landlord_id,$tenant_id);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getApartment($id);
            return array("result"=>True,"message"=>"Added apartment","apartment"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function setApartment(Array $array, $mysqli){
        $stmt = $mysqli->query("UPDATE 'apartment' SET apartmentcode = ?, landlord_id = ?, tenant_id = ? WHERE id = ?");
        $newapartmentcode = $array['newapartmentcode'];
        $newlandlord_id = $array['newlandlord_id'];
        $newtenant_id = $array['newtenant_id'];
        $apartment_id = $array['apartment_id'];
        $stmt->bind_param("sssi",$newapartmentcode,$newlandlord_id,$newtenant_id,$apartment_id);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getApartment($id);
            return array("result"=>True,"message"=>"Updated apartment","apartment"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function setTenant(Array $array, $mysqli){
        $stmt = $mysqli->query("UPDATE 'tenant' SET firstname = ?, lastname = ?, contactnumber = ?, username = ?, password = ?  WHERE id = ?");
        $newfirstname = $array['newfirstname'];
        $newlastname = $array['newlastname'];
        $newcontactnumber = $array['newcontactnumber'];
        $newusername = $array['newusername'];
        $newpassword = $array['newpassword'];
        $tenant_id = $array['tenant_id'];
        $stmt->bind_param("sssssi",$newfirstname,$newlastname,$newcontactnumber,$newusername,$newpassword,$tenant_id);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getTenant($id);
            return array("result"=>True,"message"=>"Updated tenant","tenant"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function setReceivable(Array $array, $mysqli){
        $stmt = $mysqli->query("UPDATE 'receivable' SET name = ?, repeat = ?, price = ? WHERE id = ?");
        $newname = $array['newname'];
        $newrepeat = $array['newrepeat'];
        $newprice = $array['newprice'];
        $receivable_id = $array['receivable_id'];
        $stmt->bind_param("ssii",$newname,$newrepeat,$newprice,$receivable_id);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getReceivable($id);
            return array("result"=>True,"message"=>"Updated receivable","receivable"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function setLandlord(Array $array, $mysqli){
        $stmt = $mysqli->query("UPDATE 'landlord' SET firstname = ?, lastname = ?, contactnumber = ?, username = ?, password = ?  WHERE id = ?");
        $newfirstname = $array['newfirstname'];
        $newlastname = $array['newlastname'];
        $newcontactnumber = $array['newcontactnumber'];
        $newusername = $array['newusername'];
        $newpassword = $array['newpassword'];
        $landlord_id = $array['landlord_id'];
        $stmt->bind_param("sssssi",$newfirstname,$newlastname,$newcontactnumber,$newusername,$newpassword,$landlord_id);
        if($stmt->execute()){
            $id = $mysqli->insert_id;
            $info = getLandlord($id);
            return array("result"=>True,"message"=>"Updated landlord","landlord"=>$info);
        } else {
            return array("result"=>False,"message"=>"An error occurred");
        }
    }

    function getLandlord($mysqli){
        $stmt = $mysqli->prepare("SELECT * FROM `landlord` WHERE id=? LIMIT 1");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$first_name,$last_name,$contactnumber,$username,$password);
        $stmt->fetch();
        $array = array(
            "id"=>$id,
            "firstname"=>$first_name,
            "lastname"=>$last_name,
            "contactnumber"=>$contactnumber,
            "username"=>$username,
            "password"=>$password
        );
        
        return $array;
    }

    function getTenant($mysqli){
        $stmt = $mysqli->prepare("SELECT * FROM `tenant` WHERE id=? LIMIT 1");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$first_name,$last_name,$contactnumber,$username,$password);
        $stmt->fetch();
        $array = array(
            "id"=>$id,
            "firstname"=>$first_name,
            "lastname"=>$last_name,
            "contactnumber"=>$contactnumber,
            "username"=>$username,
            "password"=>$password
        );

        return $array;
    }

    function getAppartment($mysqli){
        $stmt = $mysqli->prepare("SELECT * FROM 'apartment' WHERE id=? LIMIT 1");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$apartmentcode,$landlord_id,$tenant_id);
        $stmt->fetch();
        $array = array(
            "id"=>$id,
            "apartmentcode"=>$apartmentcode,
            "landlord_id"=>$landlord_id,
            "tenant_id"=>$tenant_id
        );

        return $array;
    }

    function getReceivable($mysqli){
        $stmt = $mysqli->prepare("SELECT * FROM 'receivable' WHERE id=? LIMIT 1");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$name,$repeat,$price);
        $stmt->fetch();
        $array = array(
            "id"=>$id,
            "name"=>$name,
            "repeat"=>$repeat,
            "price"=>$price
        );

        return $array;
    }

    function getAllTenant($mysqli){
        $stmt = "SELECT * FROM `tenant` ";
        $array = array();

        if($result = $this->mysqli->query($stmt)){
            while($a = $result->fetch_array()){
                $ar = array(
                    "id"=>$a['id'],
                    "firstname"=>$a['firstname'],
                    "lastname"=>$a['lastname'],
                    "contactnumber"=>$a['contactnumber'],
                    "username"=>$a['username'],
                    "password"=>$a['password']
                );
                $array[] = $ar;
            }
        }

        return $array;
    }

    function getAllReceivable($mysqli){
        $stmt = "SELECT * FROM `receivable` ";
        $array = array();

        if($result = $this->mysqli->query($stmt)){
            while($a = $result->fetch_array()){
                $ar = array(
                    "id"=>$a['id'],
                    "name"=>$a['name'],
                    "repeat"=>$a['repeat'],
                    "price"=>$a['price']
                );
                $array[] = $ar;
            }
        }

        return $array;
    }

    function getAllAppartment($mysqli){
        $stmt = "SELECT * FROM `apartment` ";
        $array = array();

        if($result = $this->mysqli->query($stmt)){
            while($a = $result->fetch_array()){
                $ar = array(
                    "id"=>$a['id'],
                    "apartmentcode"=>$a['apartmentcode'],
                    "landlord_id"=>$a['landlord_id'],
                    "tenant_id"=>$a['tenant_id']
                );
                $array[] = $ar;
            }
        }

        return $array;
    }

    function getAllLandlord($mysqli){
        $stmt = "SELECT * FROM `landlord` ";
        $array = array();

        if($result = $this->mysqli->query($stmt)){
            while($a = $result->fetch_array()){
                $ar = array(
                    "id"=>$a['id'],
                    "firstname"=>$a['firstname'],
                    "lastname"=>$a['lastname'],
                    "contactnumber"=>$a['contactnumber'],
                    "username"=>$a['username'],
                    "password"=>$a['password']
                );
                $array[] = $ar;
            }
        }

        return $array;
    }
?>