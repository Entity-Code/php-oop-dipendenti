<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    <title>php-oop-dipendenti</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    <style>
        
        body {  
            background-color: black;
            color: white;
            margin: 0 50px;
        }
    </style>
</head>
<body>
        <!-- creare 3 classi per rappresentare la seguente realta':
        - persona
        - dipendente
        - boss
        cercare inoltre di scegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazioni di parantela (chi estende chi);
        per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
        instanziando le varie classi provare a stampare cercando di ottenere un log sensato-->
        <h2>
        

            <?php 
                //PERSON (main)
                class Person {
                    private $name;
                    private $lastname;
                    private $dateOfBirth;

                    public function __construct($name, $lastname, $dateOfBirth) {
                        $this -> setName($name);
                        $this -> setLastName($lastname);
                        $this -> setDateOfBirth($dateOfBirth);                       
                    }

                    //METODS (GETTER/SETTER)
                    //name
                    public function getName() {
                        return $this -> name;
                    }
                    public function setName($name) {
                        $this -> name = $name;
                    }
                    //lastname
                    public function getLastName() {
                        return $this -> lastname;
                    }
                    public function setLastName($lastname) {
                        $this -> lastname = $lastname;
                    }
                    //DateOfBirth
                    public function getDateOfBirth() {
                        return $this -> dateOfBirth;
                    }
                    public function setDateOfBirth($dateOfBirth) {
                        $this -> dateOfBirth = $dateOfBirth;
                    }

                    //toString
                    public function __toString() {
                        return
                            "name: " . $this -> getName() . "<br>"
                        .   "lastname: " . $this -> getLastName() . "<br>"
                        .   "date of birth: " . $this -> getDateOfBirth();
                    }
                }

                //EMPLOYEE (EXTENSION)
                class Employee extends Person {
                    private $id;
                    private $rank;
                    private $salary;
                    
                    public function __construct($name, $lastname, $dateOfBirth, $id, $rank, $salary) {
                        parent::__construct($name, $lastname, $dateOfBirth);
                        $this -> setId($id);
                        $this -> setRank($rank);
                        $this -> setSalary($salary);
                    }

                    //METODS (GETTER/SETTER)
                    //id
                    public function getId() {
                        return $this -> id;
                    }
                    public function setId($id) {
                        $this -> id = $id;
                    }
                    //rank
                    public function getRank() {
                        return $this -> rank;
                    }
                    public function setRank($rank) {
                        $this -> rank = $rank;
                    }

                    //salary
                    public function getSalary() {
                        return $this -> salary;
                    }
                    public function setSalary($salary) {
                        $this -> salary = $salary;
                    }

                    //toString
                    public function __toString() {
                        return parent::__toString() . "<br>"
                        .   "id: " . $this -> getId() . "<br>"
                        .   "rank: " . $this -> getRank() . "<br>"
                        .   "salary: " . $this -> getSalary();
                    }

                }

                //BOSS (EXTENSION)
                class Boss extends Person {
                    private $level;
                    private $hp;
                    private $att;
                    private $def;

                    public function __construct($name, $lastname, $dateOfBirth, $level, $hp, $att, $def) {
                        parent::__construct($name, $lastname, $dateOfBirth);
                        $this -> setLevel($level);
                        $this -> setHp($hp);
                        $this -> setAtt($att);
                        $this -> setDef($def);
                    }

                    //METODS (GETTER/SETTER)
                    //level
                    public function getLevel() {
                        return $this -> level;
                    }
                    public function setLevel($level) {
                        $this -> level = $level;
                    }
                    //hp
                    public function getHp() {
                        return $this -> hp;
                    }
                    public function setHp($hp) {
                        $this -> hp = $hp;
                    }
                    //att
                    public function getAtt() {
                        return $this -> att;
                    }
                    public function setAtt($att) {
                        $this -> att = $att;
                    }
                    //def
                    public function getDef() {
                        return $this -> def;
                    }
                    public function setDef($def) {
                        $this -> def = $def;
                    }

                    //toString
                    public function __toString() {
                        return parent::__toString() . "<br>"
                        .   "level: " . $this -> getLevel() . "<br>"
                        .   "hp: " . $this -> getHp() . "<br>"
                        .   "att: " . $this -> getAtt() . "<br>"
                        .   "def: " . $this -> getDef();
                    }
                }



                //output Person
                echo "<h1>PEOPLE</h1>";
                $person1 = new Person("Federico", "Barretta", "01/05/1984");
                echo "PERSON" . "<br>" . $person1 . "<br><br>";
                $person2 = new Person("Mario", "Cante", "23/04/1996");
                echo "PERSON" . "<br>" . $person2 . "<br><br>";
                $person3 = new Person("Piero", "Castaldi", "13/12/2000");
                echo "PERSON" . "<br>" . $person3 . "<br><br>";

                echo "<br>";
                
                //output emplyee
                echo "<h1>EMPLOYEES</h1>";
                $employee1 = new Employee("Nicola", "Rossi", "25/07/1998", 42, "web designer", 1250);
                echo "EMPLOYEE" . "<br>" . $employee1 . "<br><br>";
                $employee2 = new Employee("Matteo", "Vivaldi", "03/01/1979", 12, "frontend developer", 1250);
                echo "EMPLOYEE" . "<br>" . $employee2 . "<br><br>";
                $employee3 = new Employee("Nicola", "Rossi", "09/28/2000", 53, "backend developer", 1250);
                echo "EMPLOYEE" . "<br>" . $employee3 . "<br><br>";

                echo "<br>";

                //output boss
                echo "<h1>BOSS</h1>";
                $boss = new Boss("Mattia", "Tummolillo", "19/03/2001", 99, "999999", 8000,  7500);
                echo $boss;
                
            ?>



        </h2>
     


<script src="script.js"></script>

</body>
</html>


