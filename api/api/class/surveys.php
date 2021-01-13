<?php
    class Survey {

        // Connection
        private $conn;

        // Table
        private $db_table = "summary_tbl";

        // Columns
        public $summary_id;
        public $respondant_name;
        public $respondant_email;
        public $respondant_surname;
        public $unique_code;
        public $completed_datetime;
        public $respondant_phone;
        public $mobiliser_id;
        public $province;
        public $district;
        public $municipality;
        public $project_name;
        public $comments;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getSurveys(){
            $sqlQuery = "SELECT summary_id, respondant_name, respondant_email, respondant_surname, unique_code, completed_datetime, respondant_phone, mobiliser_id, province, district, municipality, project_name, comments FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createEmployee(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        respondant_name = :respondant_name, 
                        respondant_email = :respondant_email, 
                        respondant_surname = :respondant_surname, 
                        unique_code = :unique_code, 
                        completed_datetime = :completed_datetime,
                        respondant_phone = :respondant_phone,
                        mobiliser_id = :mobiliser_id, 
                        province = :province,
                        district = :district,
                        municipality = :municipality
                        project_name = :project_name,
                        comments = :comments                        
                        ";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->respondant_name=htmlspecialchars(strip_tags($this->respondant_name));
            $this->respondant_email=htmlspecialchars(strip_tags($this->respondant_email));
            $this->respondant_surname=htmlspecialchars(strip_tags($this->respondant_surname));
            $this->unique_code=htmlspecialchars(strip_tags($this->unique_code));
            $this->completed_datetime=htmlspecialchars(strip_tags($this->completed_datetime));
            $this->respondant_phone=htmlspecialchars(strip_tags($this->respondant_phone));
            $this->mobiliser_id=htmlspecialchars(strip_tags($this->mobiliser_id));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->district=htmlspecialchars(strip_tags($this->district));
            $this->municipality=htmlspecialchars(strip_tags($this->municipality));
            $this->project_name=htmlspecialchars(strip_tags($this->project_name));
            $this->comments=htmlspecialchars(strip_tags($this->comments));                        
        
            // bind data
            $stmt->bindParam(":respondant_name", $this->respondant_name);
            $stmt->bindParam(":respondant_email", $this->respondant_email);
            $stmt->bindParam(":respondant_surname", $this->respondant_surname);
            $stmt->bindParam(":unique_code", $this->unique_code);
            $stmt->bindParam(":completed_datetime", $this->completed_datetime);
            $stmt->bindParam(":respondant_phone", $this->respondant_phone);
            $stmt->bindParam(":mobiliser_id", $this->mobiliser_id);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":district", $this->district);
            $stmt->bindParam(":municipality", $this->municipality);
            $stmt->bindParam(":project_name", $this->project_name);
            $stmt->bindParam(":comments", $this->comments);            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleSurveys(){
            $sqlQuery = "SELECT 
                        summary_id, respondant_name, respondant_email, respondant_surname, unique_code, completed_datetime, respondant_phone, mobiliser_id, province, district, municipality, project_name, comments
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       summary_id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->summary_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->summary_id = $dataRow['summary_id'];
            $this->respondant_name = $dataRow['respondant_name'];
            $this->respondant_email = $dataRow['respondant_email'];
            $this->respondant_surname = $dataRow['respondant_surname'];
            $this->unique_code = $dataRow['unique_code'];          
            $this->completed_datetime = $dataRow['completed_datetime'];
            $this->respondant_phone = $dataRow['respondant_phone'];
            $this->mobiliser_id = $dataRow['mobiliser_id'];
            $this->province = $dataRow['province'];
            $this->district = $dataRow['district'];
            $this->municipality = $dataRow['municipality'];
            $this->project_name = $dataRow['project_name'];
            $this->comments = $dataRow['comments'];                         
        }        

        // UPDATE
        public function updateEmployee(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        respondant_name = :respondant_name, 
                        respondant_email = :respondant_email, 
                        respondant_surname = :respondant_surname, 
                        unique_code = :unique_code, 
                        completed_datetime = :completed_datetime,
                        respondant_phone = :respondant_phone,
                        mobiliser_id = :mobiliser_id,
                        province = :province,
                        district = :district,
                        municipality = :municipality,
                        project_name = :project_name,
                        comments = :comments                        
                    WHERE 
                        summary_id = :summary_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->respondant_name=htmlspecialchars(strip_tags($this->respondant_name));
            $this->respondant_email=htmlspecialchars(strip_tags($this->respondant_email));
            $this->respondant_surname=htmlspecialchars(strip_tags($this->respondant_surname));
            $this->unique_code=htmlspecialchars(strip_tags($this->unique_code));
            $this->completed_datetime=htmlspecialchars(strip_tags($this->completed_datetime));
            $this->respondant_phone=htmlspecialchars(strip_tags($this->respondant_phone));
            $this->mobiliser_id=htmlspecialchars(strip_tags($this->mobiliser_id));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->district=htmlspecialchars(strip_tags($this->district));
            $this->municipality=htmlspecialchars(strip_tags($this->municipality));
            $this->summary_id=htmlspecialchars(strip_tags($this->summary_id));
            $this->project_name=htmlspecialchars(strip_tags($this->project_name));
            $this->comments=htmlspecialchars(strip_tags($this->comments));            
        
            // bind data
            $stmt->bindParam(":respondant_name", $this->respondant_name);
            $stmt->bindParam(":respondant_email", $this->respondant_email);
            $stmt->bindParam(":respondant_surname", $this->respondant_surname);
            $stmt->bindParam(":unique_code", $this->unique_code);
            $stmt->bindParam(":completed_datetime", $this->completed_datetime);
            $stmt->bindParam(":respondant_phone", $this->respondant_phone);
            $stmt->bindParam(":mobiliser_id", $this->mobiliser_id);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":district", $this->district);
            $stmt->bindParam(":municipality", $this->municipality);
            $stmt->bindParam(":summary_id", $this->summary_id);
            $stmt->bindParam(":project_name", $this->project_name);
            $stmt->bindParam(":comments", $this->comments);            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteEmployee(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE summary_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->summary_id=htmlspecialchars(strip_tags($this->summary_id));
        
            $stmt->bindParam(1, $this->summary_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>