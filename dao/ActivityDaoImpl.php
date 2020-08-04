<?php

class ActivityDaoImpl{
    public function fetchActivityData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT f.name, a.* FROM activity a INNER JOIN faculty f ON f.id = a.faculty_id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Activity');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public function fetchSelectedActivityData($id)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM activity WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Activity');
    }

    public function addActivity(Activity $activity)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "insert into activity(title,description,place,end_date,doc_photo,faculty_id) VALUES(?,?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $activity->getTitle());
        $stmt->bindValue(2, $activity->getDescription());
        $stmt->bindValue(3, $activity->getPlace());
        $stmt->bindValue(4, $activity->getEndDate());
        $stmt->bindValue(5, $activity->getDocPhoto());
        $stmt->bindValue(6, $activity->getFacultyId());
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

    public function deleteActivity($id)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "delete from activity where id = ?";
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

    public function updateActivity(Activity $activity)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'UPDATE activity SET title=?, description=?, place=?, end_date=?, doc_photo=?, faculty_id=? WHERE id=?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $activity->getTitle());
        $stmt->bindValue(2, $activity->getDescription());
        $stmt->bindValue(3, $activity->getPlace());
        $stmt->bindValue(4, $activity->getEndDate());
        $stmt->bindValue(5, $activity->getDocPhoto());
        $stmt->bindValue(6, $activity->getFacultyId());
        $stmt->bindValue(7, $activity->getId());
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
}