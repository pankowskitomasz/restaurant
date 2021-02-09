<?php

class TReservation{
    private $link;

    private function checkReservationPresence($nameA,$personsA,$phoneA,$emailA,$timeA){
        $sql = "select id from ";
        $sql .= DB_PREFIX;
        $sql .= "reservations where ";
        $sql .= "fullname =:fn and ";
        $sql .= "persons =:ps and ";
        $sql .= "phone=:ph and ";
        $sql .= "email=:em and ";
        $sql .= "time=:tm";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":fn",$nameA);
        $stmt->bindParam(":ps",$personsA);
        $stmt->bindParam(":ph",$phoneA);
        $stmt->bindParam(":em",$emailA);
        $stmt->bindParam(":tm",$timeA);
        $stmt->execute();
        return is_array($stmt->fetch(PDO::FETCH_ASSOC))?true:false;
    }

    public function deleteMessage($resID){
        $sql = "delete from ";
        $sql .= DB_PREFIX;
        $sql .= "reservations where id=:mid";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":mid",$resID);
        return $stmt->execute();
    }

    public function getList(){
        $stmt = $this->link->prepare("select * from ".DB_PREFIX."reservations");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res;    
    }

    public function getListLength(){
        $stmt = $this->link->prepare("select count(*) from ".DB_PREFIX."reservations");
        $stmt->execute();
        $res = $stmt->fetchAll();
        return $res[0][0];    
    }

    public function __construct($dbLinkA=null){
        $this->link = $dbLinkA;
    }

    public function getDBLink(){
        return $this->link;
    }

    public function insert($nameA,$personsA,$phoneA,$emailA,$timeA){
        if(!$this->checkReservationPresence($nameA,$personsA,$phoneA,$emailA,$timeA)){
            $sql = "insert into ";
            $sql .= DB_PREFIX;
            $sql .= "reservations(fullname,persons,phone,email,time) ";
            $sql .= "values(:fn,:ps,:ph,:em,:tm)";
            $stmt = $this->link->prepare($sql);
            $stmt->bindParam(":fn",$nameA);
            $stmt->bindParam(":ps",$personsA);
            $stmt->bindParam(":ph",$phoneA);
            $stmt->bindParam(":em",$emailA);
            $stmt->bindParam(":tm",$timeA);
            return $stmt->execute();
        }
        return false;
    }

    public function getById($resID){
        $sql = "select * from ";
        $sql .= DB_PREFIX;
        $sql .= "reservations where id=:msgid";
        $stmt = $this->link->prepare($sql);
        $stmt->bindParam(":msgid",$resID);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;    
    }

    public function getByTag($tagA){
        $sql = "select * from ";
        $sql .= DB_PREFIX;
        $sql .= "reservations where ";
        $sql .= "fullname like \"%$tagA%\" or ";
        $sql .= "persons like \"%$tagA%\" or ";
        $sql .= "phone like \"%$tagA%\" or ";
        $sql .= "email like \"%$tagA%\" or ";
        $sql .= "time like \"%$tagA%\"";
        $stmt = $this->link->prepare($sql);
        $stmt->execute();        
        $res = $stmt->fetchAll();
        return $res;    
    }

    public function setDBLink($dbLinkA=null){
        $this->link = (isset($dbLinkA))?$dbLinkA:null;        
    }
}

?>