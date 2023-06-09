<?php
class User {
    private $userTable = 'user';	
	private $followTable = 'social_follow';

    public $followUserId;
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }	    
    
    
    public function getUser(){	
        if(!empty($_SESSION["user_id"])) {
            $sqlQuery = "
                SELECT *
                FROM ".$this->userTable." 
                WHERE user_id = '".$_SESSION["user_id"]."'";	
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();			
            $result = $stmt->get_result();		
            $userDetails = array();		
            while ($user = $result->fetch_assoc()) { 				
                $userDetails['user_id'] = $user['user_id'];				
                $userDetails['name'] = $user['name'];							
                $userDetails['email'] = $user['email'];
                
                
            }	
            return $userDetails;	
        }
    }
    
    
    public function getUnfollowedUsers(){	
        if(!empty($_SESSION["userid"])) {
            $sqlQuery = "
                SELECT user.id, user.name
                FROM ".$this->userTable." AS user
                WHERE user.id != '".$_SESSION["userid"]."' AND user.id NOT IN (SELECT follow.followed_user_id FROM ".$this->followTable." AS follow WHERE follow.follower_id = '".$_SESSION["userid"]."')";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();			
            $result = $stmt->get_result();		
            return $result;	
        }
    }
    
    public function getFollowedUsers(){	
        if(!empty($_SESSION["user_id"])) {
            $sqlQuery = "
                SELECT user.user_id, user.username, user.profile_image
                FROM ".$this->userTable." AS user
                WHERE user.user_id != '".$_SESSION["user_id"]."' AND user.user_id IN (SELECT follow.followed_user_id FROM ".$this->followTable." AS follow WHERE follow.follower_id = '".$_SESSION["user_id"]."')";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();			
            $result = $stmt->get_result();		
            return $result;	
        }
    }
    
    public function getFollower(){	
        if(!empty($_SESSION["user_id"])) {
            $sqlQuery = "
                SELECT user.user_id, user.username, user.profile_image
                FROM ".$this->userTable." AS user
                LEFT JOIN ".$this->followTable." follow ON user.user_id = follower_id 
                WHERE follow.followed_user_id = '".$_SESSION["user_id"]."' ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();			
            $result = $stmt->get_result();		
            return $result;	
        }
    }
    
    public function getFollwing(){
        if(!empty($_SESSION["user_id"])) {
            $sqlQuery = "
                SELECT *
                FROM ".$this->followTable." 
                WHERE follower_id = '".$_SESSION["user_id"]."'";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();			
            $result = $stmt->get_result();	
            $allRecords = $result->num_rows;			
            return $allRecords;	
        }
    }
    public function getFollowers(){
        if(!empty($_SESSION["user_id"])) {
            $sqlQuery = "
                SELECT *
                FROM ".$this->followTable." 
                WHERE followed_user_id = '".$_SESSION["user_id"]."'";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();			
            $result = $stmt->get_result();	
            $allRecords = $result->num_rows;			
            return $allRecords;	
        }
    }
    
    public function followUser() {
        if($_SESSION["userid"] && $this->followUserId) {			
            $sqlQuery = "INSERT INTO ".$this->followTable."(`follower_id`, `followed_user_id`)
                VALUES(?, ?)";					
            $stmt = $this->conn->prepare($sqlQuery);						
            $stmt->bind_param("ii", $_SESSION["userid"], $this->followUserId);	
            if($stmt->execute()){				
                $output = array(			
                    "success"	=> 	1
                );
                echo json_encode($output);
            }
        }		
    }
    
    public function unfollowUser() {
        if($_SESSION["userid"] && $this->followUserId) {			
            $sqlQuery = "DELETE FROM ".$this->followTable." 
            WHERE follower_id = ? AND followed_user_id = ?";					
            $stmt = $this->conn->prepare($sqlQuery);						
            $stmt->bind_param("ii", $_SESSION["userid"], $this->followUserId);	
            if($stmt->execute()){				
                $output = array(			
                    "success"	=> 	1
                );
                echo json_encode($output);
            }
        }		
    }
}



