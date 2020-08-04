<?php

class FacultyDaoImpl{
    public function fetchFacultyData(){
        $link = PDOUtil::createConnection();
        $query = "select * from faculty";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Faculty');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function fetchSelectedFacultyData($id){
        $link = PDOUtil::createConnection();
        $query = 'select * from faculty where id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Faculty');
    }

    public function addFaculty(Faculty $faculty){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "insert into faculty(id, name) VALUES(?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $faculty->getId());
        $stmt->bindValue(2, $faculty->getName());
        $link->beginTransaction();
        if ($stmt->execute()){
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function deleteFaculty($id){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "delete from faculty where id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function updateFaculty(Faculty $faculty, $cid){
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'UPDATE faculty set id=?,name=? where id=?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $faculty->getId());
        $stmt->bindValue(2, $faculty->getName());
        $stmt->bindParam(3, $cid);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
            $result = 1;
        }else{
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }
}