<?php
    class User {

		// Attributs
		private $_pseudo;
		private $_email;
		private $_password;
        private $_secret;
        private $_salt;

		// Constructeur
		public function __construct($pseudo, $email, $password, $salt, $secret) {

			$this->setPseudo($pseudo);
			$this->setEmail($email);
			$this->setPassword($password);
			$this->setSecret($secret);
			$this->setSalt($salt);

		}

		// Getters
		public function getPseudo() {
			return $this->_pseudo;
		}
		public function getEmail() {
			return $this->_email;
		}
		public function getPassword() {
			return $this->_password;
		}
		public function getSecret() {
			return $this->_secret;
		}
		public function getSalt() {
			return $this->_salt;
		}

		// Setters
		public function setPseudo($pseudo) {
			$this->_pseudo = $pseudo;
		}
		public function setEmail($email) {
			$this->_email = $email;
		}
		public function setPassword($password) {
			$this->_password = $password;
		}
		public function setSecret($secret) {
			$this->_secret = $secret;
		}
		public function setSalt($salt) {
			$this->_salt = $salt;
		}

		// Méthodes
		public function recordUser() {
			require('controllers/connect.php');
			$requete = $db->prepare('INSERT INTO users(username, email, password, secret, salt) VALUES(?, ?, ?,?,?)');
			$requete->execute([
				$this->getPseudo(),
				$this->getEmail(),
				$this->getPassword(),
				$this->getSecret(),
				$this->getSalt()
			]);
		}

		public function createSession() {
			$_SESSION['connect'] = true;
			$_SESSION['pseudo']  = $this->getPseudo();
			$_SESSION['email']   = $this->getEmail();
		}

	}