<?php

class Tickets
{

	private $idTicket;
	private $titleTicket;
	private $dateTicket;
	private $descriptionTicket;
	private $statusTicket;

	public function getIdTicket()
	{
		return $this->idTicket;
	}

	public function setIdTicket($idTicket)
	{
		$this->idTicket = $idTicket;

		return $this;
	}

	public function getIdUser()
	{
		return $this->idUser;
	}

	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;

		return $this;
	}

	public function getTitleTicket()
	{
		return $this->titleTicket;
	}

	public function setTitleTicket($titleTicket)
	{
		$this->titleTicket = $titleTicket;

		return $this;
	}

	public function getDateTicket()
	{
		return $this->dateTicket;
	}

	public function setDateTicket($dateTicket)
	{
		$this->dateTicket = $dateTicket;

		return $this;
	}

	public function getDescriptionTicket()
	{
		return $this->descriptionTicket;
	}

	public function setDescriptionTicket($descriptionTicket)
	{
		$this->descriptionTicket = $descriptionTicket;

		return $this;
	}

	public function getStatusTicket()
	{
		return $this->statusTicket;
	}

	public function setStatusTicket($statusTicket)
	{
		$this->statusTicket = $statusTicket;

		return $this;
	}
}
