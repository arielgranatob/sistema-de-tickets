<?php

class Tickets
{

	private $codTicket;
	private $titleTicket;
	private $dateTicket;
	private $descriptionTicket;
	private $statusTicket;

	public function getCodTicket()
	{
		return $this->codTicket;
	}

	public function setCodTicket($codTicket)
	{
		$this->codTicket = $codTicket;

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
