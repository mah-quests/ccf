<?php
    class Mobiliser{

        // Connection
        private $conn;

        // Table
        private $db_table = "mobiliser_tbl";

        // Columns
        public $mobiliser_id;
        public $net_structure;
        public $first_name;
        public $email;
        public $age;
        public $created_date;
        public $surname;
        public $date_of_birth;
        public $cellnumber;        
        public $race;
        public $religion;
        public $sex;        
        public $gender_id;
        public $gender;        
        public $prefix;
        public $pronouns;
        public $mobaliser_address;
        public $province;        
        public $district;
        public $municipality;        
        public $alternate_person;
        public $alternate_number;
        public $disable;
        public $disability_type;        
        public $school_level;


        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getMobilisers(){
            $sqlQuery = "SELECT 
                mobiliser_id, 
                first_name, 
                net_structure, 
                surname, 
                date_of_birth, 
                age, 
                cellnumber, 
                email, 
                race, 
                religion, 
                sex, 
                gender_id, 
                gender, 
                prefix, 
                pronouns, 
                mobaliser_address, 
                province, 
                district, 
                municipality, 
                alternate_person, 
                alternate_number, 
                disable, 
                disability_type, 
                school_level, 
                created_date FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createMobilisers(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        first_name = :first_name, 
                        email = :email, 
                        age = :age, 
                        net_structure = :net_structure, 
                        surname = :surname,
                        date_of_birth = :date_of_birth,
                        cellnumber = :cellnumber,
                        race = :race,
                        religion = :religion,
                        sex = :sex,        
                        gender_id = :gender_id,
                        gender = :gender,        
                        prefix = :prefix,
                        pronouns = :pronouns,
                        mobaliser_address = :mobaliser_address,
                        province = :province,      
                        district = :district,
                        municipality = :municipality,  
                        alternate_person = :alternate_person,
                        alternate_number = :alternate_number,
                        disable = :disable,
                        disability_type = :disability_type,
                        school_level = :school_level,                        
                        created_date = :created_date";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->net_structure=htmlspecialchars(strip_tags($this->net_structure));
            $this->created_date=htmlspecialchars(strip_tags($this->created_date));
            $this->surname=htmlspecialchars(strip_tags($this->surname));
            $this->date_of_birth=htmlspecialchars(strip_tags($this->date_of_birth));
            $this->cellnumber=htmlspecialchars(strip_tags($this->cellnumber));
            $this->race=htmlspecialchars(strip_tags($this->race));
            $this->religion=htmlspecialchars(strip_tags($this->religion));
            $this->sex=htmlspecialchars(strip_tags($this->sex));
            $this->gender_id=htmlspecialchars(strip_tags($this->gender_id));
            $this->gender=htmlspecialchars(strip_tags($this->gender));
            $this->prefix=htmlspecialchars(strip_tags($this->prefix));
            $this->pronouns=htmlspecialchars(strip_tags($this->pronouns));
            $this->mobaliser_address=htmlspecialchars(strip_tags($this->mobaliser_address));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->district=htmlspecialchars(strip_tags($this->district));
            $this->municipality=htmlspecialchars(strip_tags($this->municipality));
            $this->alternate_person=htmlspecialchars(strip_tags($this->alternate_person));
            $this->alternate_number=htmlspecialchars(strip_tags($this->alternate_number));
            $this->disable=htmlspecialchars(strip_tags($this->disable));
            $this->disability_type=htmlspecialchars(strip_tags($this->disability_type));
            $this->school_level=htmlspecialchars(strip_tags($this->school_level));
                                                
                
            // bind data
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":net_structure", $this->net_structure);
            $stmt->bindParam(":created_date", $this->created_date);
            $stmt->bindParam(":surname", $this->surname);
            $stmt->bindParam(":date_of_birth", $this->date_of_birth);
            $stmt->bindParam(":cellnumber", $this->cellnumber);
            $stmt->bindParam(":race", $this->race);
            $stmt->bindParam(":religion", $this->religion);
            $stmt->bindParam(":sex", $this->sex);
            $stmt->bindParam(":gender_id", $this->gender_id);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":prefix", $this->prefix);
            $stmt->bindParam(":pronouns", $this->pronouns);
            $stmt->bindParam(":mobaliser_address", $this->mobaliser_address);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":district", $this->district);
            $stmt->bindParam(":municipality", $this->municipality);
            $stmt->bindParam(":alternate_person", $this->alternate_person);
            $stmt->bindParam(":alternate_number", $this->alternate_number);
            $stmt->bindParam(":disable", $this->disable);
            $stmt->bindParam(":disability_type", $this->disability_type);
            $stmt->bindParam(":school_level", $this->school_level);            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleMobiliser(){
            $sqlQuery = "SELECT
                        mobiliser_id, 
                        first_name, 
                        email, 
                        age, 
                        net_structure, 
                        created_date,
                        surname,
                        date_of_birth,
                        cellnumber,
                        race,
                        religion,
                        sex,
                        gender_id,
                        gender,
                        prefix,
                        pronouns,
                        mobaliser_address,
                        province,
                        district,
                        municipality,
                        alternate_person,
                        alternate_number,
                        disable,
                        disability_type,
                        school_level
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       mobiliser_id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->mobiliser_id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->first_name = $dataRow['first_name'];
            $this->email = $dataRow['email'];
            $this->age = $dataRow['age'];
            $this->net_structure = $dataRow['net_structure'];
            $this->created_date = $dataRow['created_date'];
            $this->surname = $dataRow['surname'];
            $this->date_of_birth = $dataRow['date_of_birth'];
            $this->cellnumber = $dataRow['cellnumber'];
            $this->race = $dataRow['race'];
            $this->religion = $dataRow['religion'];
            $this->sex = $dataRow['sex'];
            $this->gender_id = $dataRow['gender_id'];
            $this->gender = $dataRow['gender'];
            $this->prefix = $dataRow['prefix'];
            $this->pronouns = $dataRow['pronouns'];
            $this->mobaliser_address = $dataRow['mobaliser_address'];
            $this->province = $dataRow['province'];
            $this->district = $dataRow['district'];
            $this->municipality = $dataRow['municipality'];
            $this->alternate_person = $dataRow['alternate_person'];
            $this->alternate_number = $dataRow['alternate_number'];
            $this->disable = $dataRow['disable'];
            $this->disability_type = $dataRow['disability_type'];
            $this->school_level = $dataRow['school_level'];            

        }        


        // READ single
        public function getMobiliserByCellphone(){
            $sqlQuery = "SELECT
                        mobiliser_id, 
                        first_name, 
                        email, 
                        age, 
                        net_structure, 
                        created_date,
                        surname,
                        date_of_birth,
                        cellnumber,
                        race,
                        religion,
                        sex,
                        gender_id,
                        gender,
                        prefix,
                        pronouns,
                        mobaliser_address,
                        province,
                        district,
                        municipality,
                        alternate_person,
                        alternate_number,
                        disable,
                        disability_type,
                        school_level
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       cellnumber = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->cellnumber);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->first_name = $dataRow['first_name'];
            $this->email = $dataRow['email'];
            $this->age = $dataRow['age'];
            $this->net_structure = $dataRow['net_structure'];
            $this->created_date = $dataRow['created_date'];
            $this->surname = $dataRow['surname'];
            $this->date_of_birth = $dataRow['date_of_birth'];
            $this->cellnumber = $dataRow['cellnumber'];
            $this->race = $dataRow['race'];
            $this->religion = $dataRow['religion'];
            $this->sex = $dataRow['sex'];
            $this->gender_id = $dataRow['gender_id'];
            $this->gender = $dataRow['gender'];
            $this->prefix = $dataRow['prefix'];
            $this->pronouns = $dataRow['pronouns'];
            $this->mobaliser_address = $dataRow['mobaliser_address'];
            $this->province = $dataRow['province'];
            $this->district = $dataRow['district'];
            $this->municipality = $dataRow['municipality'];
            $this->alternate_person = $dataRow['alternate_person'];
            $this->alternate_number = $dataRow['alternate_number'];
            $this->disable = $dataRow['disable'];
            $this->disability_type = $dataRow['disability_type'];
            $this->school_level = $dataRow['school_level'];            

        }  

        // UPDATE
        public function updateMobiliser(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        first_name = :first_name, 
                        email = :email, 
                        age = :age, 
                        net_structure = :net_structure, 
                        surname = :surname,
                        date_of_birth = :date_of_birth,
                        cellnumber = :cellnumber,
                        race = :race,
                        religion = :religion,
                        sex = :sex,        
                        gender_id = :gender_id,
                        gender = :gender,        
                        prefix = :prefix,
                        pronouns = :pronouns,
                        mobaliser_address = :mobaliser_address,
                        province = :province,      
                        district = :district,
                        municipality = :municipality,  
                        alternate_person = :alternate_person,
                        alternate_number = :alternate_number,
                        disable = :disable,
                        disability_type = :disability_type,
                        school_level = :school_level,  
                        created_date = :created_date
                    WHERE 
                        mobiliser_id = :mobiliser_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->net_structure=htmlspecialchars(strip_tags($this->net_structure));
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->surname=htmlspecialchars(strip_tags($this->surname));
            $this->date_of_birth=htmlspecialchars(strip_tags($this->date_of_birth));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->cellnumber=htmlspecialchars(strip_tags($this->cellnumber));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->race=htmlspecialchars(strip_tags($this->race));
            $this->religion=htmlspecialchars(strip_tags($this->religion));
            $this->sex=htmlspecialchars(strip_tags($this->sex));
            $this->gender_id=htmlspecialchars(strip_tags($this->gender_id));
            $this->gender=htmlspecialchars(strip_tags($this->gender));
            $this->prefix=htmlspecialchars(strip_tags($this->prefix));
            $this->pronouns=htmlspecialchars(strip_tags($this->pronouns));
            $this->mobaliser_address=htmlspecialchars(strip_tags($this->mobaliser_address));
            $this->province=htmlspecialchars(strip_tags($this->province));
            $this->district=htmlspecialchars(strip_tags($this->district));
            $this->municipality=htmlspecialchars(strip_tags($this->municipality));
            $this->alternate_person=htmlspecialchars(strip_tags($this->alternate_person));
            $this->alternate_number=htmlspecialchars(strip_tags($this->alternate_number));
            $this->disable=htmlspecialchars(strip_tags($this->disable));
            $this->disability_type=htmlspecialchars(strip_tags($this->disability_type));
            $this->school_level=htmlspecialchars(strip_tags($this->school_level));
            $this->created_date=htmlspecialchars(strip_tags($this->created_date));                                                

        
            // bind data
            $stmt->bindParam(":net_structure", $this->net_structure);
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":surname", $this->surname);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":created_date", $this->created_date);
            $stmt->bindParam(":mobiliser_id", $this->mobiliser_id);
            $stmt->bindParam(":date_of_birth", $this->date_of_birth);
            $stmt->bindParam(":cellnumber", $this->cellnumber);
            $stmt->bindParam(":race", $this->race);
            $stmt->bindParam(":religion", $this->religion);
            $stmt->bindParam(":sex", $this->sex);
            $stmt->bindParam(":gender_id", $this->gender_id);
            $stmt->bindParam(":gender", $this->gender);
            $stmt->bindParam(":prefix", $this->prefix);
            $stmt->bindParam(":pronouns", $this->pronouns);
            $stmt->bindParam(":mobaliser_address", $this->mobaliser_address);
            $stmt->bindParam(":province", $this->province);
            $stmt->bindParam(":district", $this->district);
            $stmt->bindParam(":municipality", $this->municipality);
            $stmt->bindParam(":alternate_person", $this->alternate_person);
            $stmt->bindParam(":alternate_number", $this->alternate_number);
            $stmt->bindParam(":disable", $this->disable);
            $stmt->bindParam(":disability_type", $this->disability_type);
            $stmt->bindParam(":school_level", $this->school_level);  

            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteMobiliser(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE mobiliser_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->mobiliser_id=htmlspecialchars(strip_tags($this->mobiliser_id));
        
            $stmt->bindParam(1, $this->mobiliser_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>