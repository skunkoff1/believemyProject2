<?php
class User
{
	// Attributs
	private $_pseudo;
	private $_email;
	private $_password;
	private $_secret;

	// Constructeur
	public function __construct($pseudo, $email, $password, $secret)
	{
		$this->setPseudo($pseudo);
		$this->setEmail($email);
		$this->setPassword($password);
		$this->setSecret($secret);
	}

	// Getters
	public function getPseudo()
	{
		return $this->_pseudo;
	}
	public function getEmail()
	{
		return $this->_email;
	}
	public function getPassword()
	{
		return $this->_password;
	}
	public function getSecret()
	{
		return $this->_secret;
	}

	// Setters
	public function setPseudo($pseudo)
	{
		$this->_pseudo = $pseudo;
	}
	public function setEmail($email)
	{
		$this->_email = $email;
	}
	public function setPassword($password)
	{
		$this->_password = $password;
	}
	public function setSecret($secret)
	{
		$this->_secret = $secret;
	}

	// Méthodes
	public function recordUser()
	{
		require('controllers/connect.php');
		$requete = $db->prepare('INSERT INTO users(username, email, password, secret) VALUES(?, ?, ?, ?)');
		$requete->execute([
			$this->getPseudo(),
			$this->getEmail(),
			$this->getPassword(),
			$this->getSecret()
		]);
	}

	public function createSession()
	{
		$_SESSION['connect'] = 1;
		$_SESSION['pseudo']  = $this->getPseudo();
		$_SESSION['email']   = $this->getEmail();
	}
}