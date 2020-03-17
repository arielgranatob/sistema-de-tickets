<?php 

	class Users{

		private $idUser;
		private $emailUser;
		private $passUser;

	    public function getIdUser()
	    {
	    	return $this->idUser;
	    }

	    public function setIdUser($idUser)
	    {
	    	$this->idUser = $idUser;

	    	return $this;
	    }

	    public function getEmailUser()
	    {
	    	return $this->emailUser;
	    }

	    public function setEmailUser($emailUser)
	    {
	    	$this->emailUser = $emailUser;

	    	return $this;
	    }

		   public function getPassUser()
	    {
	    	return $this->passUser;
	    }

	    public function setPassUser($passUser)
	    {
	    	$this->passUser = $passUser;

	    	return $this;
	    }
	}