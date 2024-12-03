<?php
require_once __DIR__ . '/../config.php';


class User {
    private int $id;
    public string $nom;
    public string $prenom;
    public string $niveauUni;
    public string $universite;
    public string $role;
    public int $etat;
    public string $email;
    public string $password;
    private PDO $pdo;

    function __construct(int $id, string $nom, string $prenom, string $niveauUni, string $universite, string $role, int $etat, string $email, string $password, PDO $pdo) {    
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->niveauUni = $niveauUni;
        $this->universite = $universite;
        $this->role = $role;
        $this->etat = $etat;
        $this->email = $email;
        $this->password = $password;
        $this->pdo = $pdo;
    }
   
    
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of niveauUni
     */ 
    public function getNiveauUni()
    {
        return $this->niveauUni;
    }

    /**
     * Set the value of niveauUni
     *
     * @return  self
     */ 
    public function setNiveauUni($niveauUni)
    {
        $this->niveauUni = $niveauUni;

        return $this;
    }

    /**
     * Get the value of universite
     */ 
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * Set the value of universite
     *
     * @return  self
     */ 
    public function setUniversite($universite)
    {
        $this->universite = $universite;

        return $this;
    }


    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public static function listUsers(PDO $pdo): array {
        $sql = "SELECT * FROM user";
        try {
            $query = $pdo->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception('Error listing users: ' . $e->getMessage());
        }
    }
    public static function searchAndSortUsers(PDO $pdo, $search = '', $sortBy = 'id', $order = 'ASC') {
        $sql = "SELECT * FROM user WHERE nom LIKE :search OR prenom LIKE :search OR email LIKE :search ORDER BY $sortBy $order";
        try {
            $query = $pdo->prepare($sql);
            $query->bindValue(':search', "%$search%", PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception('Error searching and sorting users: ' . $e->getMessage());
        }
    }
    // In User.php (Model)
    public static function getUserStatistics(PDO $pdo) {
        $stats = [
            'total_users' => 0,
            'total_admins' => 0,
            'total_managers' => 0,
            'active_users' => 0,
        ];
    
        try {
            // Total users
            $stmt = $pdo->prepare("SELECT COUNT(*) AS total_users FROM user");
            $stmt->execute();
            $stats['total_users'] = $stmt->fetchColumn();
    
            // Total admins
            $stmt = $pdo->prepare("SELECT COUNT(*) AS total_admins FROM user WHERE role = 'admin'");
            $stmt->execute();
            $stats['total_admins'] = $stmt->fetchColumn();
    
            // Total managers
            $stmt = $pdo->prepare("SELECT COUNT(*) AS total_managers FROM user WHERE role = 'manager_des_stages'");
            $stmt->execute();
            $stats['total_managers'] = $stmt->fetchColumn();
    
            // Active users
            $stmt = $pdo->prepare("SELECT COUNT(*) AS active_users FROM user WHERE etat = 1");
            $stmt->execute();
            $stats['active_users'] = $stmt->fetchColumn();
    
        } catch (Exception $e) {
            throw new Exception('Error fetching statistics: ' . $e->getMessage());
        }
    
        return $stats;
    }
    

    
    
    
    public function addUser(): bool {
        $sql = "INSERT INTO user (id, nom, prenom, niveauUni, universite, role,email,password,etat) VALUES (:id, :nom, :prenom, :niveauUni, :universite, :role,:email,:password,:etat)";
        try {
            $query = $this->pdo->prepare($sql);
            $query->bindParam(':id', $this->id);
            $query->bindParam(':nom', $this->nom);
            $query->bindParam(':prenom', $this->prenom);
            $query->bindParam(':niveauUni', $this->niveauUni);
            $query->bindParam(':universite', $this->universite);
            $query->bindParam(':role', $this->role);
            $query->bindParam(':email', $this->email);
            $query->bindParam(':password', $this->password);
            $query->bindParam(':etat', $this->etat);
            return $query->execute();
        } catch (Exception $e) {
            throw new Exception('Error adding user: ' . $e->getMessage());
        }
    }

  
    public function deleteUser() {
        try {
            $query = "DELETE FROM user WHERE id = :id"; // Adjust table name if needed
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Delete Error: ' . $e->getMessage());
            return false;
        }
    }
    

    
    public static function searchUser(PDO $pdo, int $id): array {
        $sql = "SELECT * FROM user WHERE id = :id";
        try {
            $query = $pdo->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);  
        } catch (PDOException $e) {
            throw new Exception('Error searching for user: ' . $e->getMessage());
        }
    }
    
    
    

    
    public function updateUser(): bool {
        $sql = "UPDATE user SET id=:id, nom=:nom, prenom=:prenom, niveauUni=:niveauUni, universite=:universite, role=:role,email=:email,password=:password,etat=:etat  WHERE id = :id";
        try {
            $query = $this->pdo->prepare($sql);
            $query->bindParam(':id', $this->id);
            $query->bindParam(':nom', $this->nom);
            $query->bindParam(':prenom', $this->prenom);
            $query->bindParam(':niveauUni', $this->niveauUni);
            $query->bindParam(':universite', $this->universite);
            $query->bindParam(':role', $this->role);
            $query->bindParam(':email', $this->email);
            $query->bindParam(':password', $this->password);
            $query->bindParam(':etat', $this->etat);
            return $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Error updating user: ' . $e->getMessage());
        }
    }

    public function save() {
        try {
            $query = "INSERT INTO user (nom, prenom, niveauUni, universite, role, etat, email, password)
                      VALUES (:nom, :prenom, :niveauUni, :universite, :role, :etat, :email, :password)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':niveauUni', $this->niveauUni);
            $stmt->bindParam(':universite', $this->universite);
            $stmt->bindParam(':role', $this->role);
            $stmt->bindParam(':etat', $this->etat, PDO::PARAM_INT);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Save User Error: ' . $e->getMessage());
            return false;
        }
    }
    public function restrictUser(int $id,int $etat){
        $sql = "UPDATE user SET etat=:etat  WHERE id = :id";
        try {
            $query = $this->pdo->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':etat', $etat);
            return $query->execute();
        } catch (PDOException $e) {
            throw new Exception('Error restricting user: ' . $e->getMessage());
        }
    }
    

}



?>