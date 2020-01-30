<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testy_jednostkowe extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('Sprawa_model', 'sprawa_m');
		$this->load->model('Pracownik_model', 'pracownik_m');
		$this->load->model('Decyzja_model', 'decyzja_m');
		

		$this->load->library('unit_test');
	}

	public function index()
	{
		echo "<h2>Testy jednostkowe</h2>";
		// echo $this->unit->run($this->sprawa_m->liczba_spraw(), 4, "Funkcja \"liczba_spraw\" test");

		echo "<h3>Dodaj sprawę</h3>";
		$wartosci_sprawa = array('cel' => "Przedłużenie");
		$wartosci_dane_wnioskodawcy = array('nazwisko' => "Kowalski",
											'imie' => "John",
											'plec' => "Mężczyzna",
											'data_urodzenia' => '2000-02-18',
											'obywatelstwo' => "Niemcy",
											'narodowosc' => "Niemcy",
											'typ_dokumentu_identyfikacyjnego' => "Dowód osobisty",
											'nr_dokumentu_identyfikacyjnego' => "YGT 672");
		$wartosci_adres_zamieszkania = array('ulica' => "Kwiatowa",
											'nr_domu' => "4c" ,
											'nr_lokalu' => "10",
											'kod_pocztowy' => "43-342",
											'miejscowosc' => "Wrocław",
											'panstwo' => "Polska");
		$wartosci_dane_pierwszego_przodka = array('nazwisko' => "Kowalska",
											'imie' => "Anna",
											'data_urodzenia' => "1975-05-12",
											'pokrewienstwo' => "Matka",
											'obywatelstwo' => "Polska",
											'typ_dokumentu_identyfikacyjnego' => "Prawo jazdy",
											'nr_dokumentu_identyfikacyjnego' => "BSJ 4321");
		$wartosci_dane_drugiego_przodka = NULL;

		echo $this->unit->run($this->sprawa_m->dodaj_sprawe($wartosci_sprawa,$wartosci_dane_wnioskodawcy,$wartosci_adres_zamieszkania,$wartosci_dane_pierwszego_przodka,$wartosci_dane_drugiego_przodka), 
								true, "Funkcja \"dodaj_sprawe\" test");


		$wartosci_sprawa = array('cel' => "Przedłużenie");
		$wartosci_dane_wnioskodawcy = array('nazwisko' => "Kowalski",
											'imie' => "John",
											'plec' => NULL,
											'data_urodzenia' => '2000-02-18',
											'obywatelstwo' => "Niemcy",
											'narodowosc' => "Niemcy",
											'typ_dokumentu_identyfikacyjnego' => "Dowód osobisty",
											'nr_dokumentu_identyfikacyjnego' => "YGT 672");
		$wartosci_adres_zamieszkania = array('ulica' => "Kwiatowa",
											'nr_domu' => "4c" ,
											'nr_lokalu' => "10",
											'kod_pocztowy' => "43-342",
											'miejscowosc' => "Wrocław",
											'panstwo' => "Polska");
		$wartosci_dane_pierwszego_przodka = array('nazwisko' => "Kowalska",
											'imie' => "Anna",
											'data_urodzenia' => "1975-05-12",
											'pokrewienstwo' => "Matka",
											'obywatelstwo' => "Polska",
											'typ_dokumentu_identyfikacyjnego' => "Prawo jazdy",
											'nr_dokumentu_identyfikacyjnego' => "BSJ 4321");
		$wartosci_dane_drugiego_przodka = NULL;

		echo $this->unit->run($this->sprawa_m->dodaj_sprawe($wartosci_sprawa,$wartosci_dane_wnioskodawcy,$wartosci_adres_zamieszkania,$wartosci_dane_pierwszego_przodka,$wartosci_dane_drugiego_przodka), 
								false, "Funkcja \"dodaj_sprawe\" test");

		$wartosci_sprawa = array('cel' => "Przedłużenie");
		$wartosci_dane_wnioskodawcy = array('nazwisko' => "Kavalitz",
											'imie' => "Johanna",
											'plec' => "Kobieta",
											'data_urodzenia' => '2000-02-18',
											'obywatelstwo' => "Czechy",
											'narodowosc' => "Czechy",
											'typ_dokumentu_identyfikacyjnego' => "Dowód osobisty",
											'nr_dokumentu_identyfikacyjnego' => "YGO 324");
		$wartosci_adres_zamieszkania = array('ulica' => NULL,
											'nr_domu' => "4c" ,
											'nr_lokalu' => NULL,
											'kod_pocztowy' => "43-342",
											'miejscowosc' => "Wrocław",
											'panstwo' => "Polska");
		$wartosci_dane_pierwszego_przodka = array('nazwisko' => "Kowalska",
											'imie' => "Anna",
											'data_urodzenia' => "1975-05-12",
											'pokrewienstwo' => "Matka",
											'obywatelstwo' => "Polska",
											'typ_dokumentu_identyfikacyjnego' => "Prawo jazdy",
											'nr_dokumentu_identyfikacyjnego' => "BSJ 4321");
		$wartosci_dane_drugiego_przodka = NULL;

		echo $this->unit->run($this->sprawa_m->dodaj_sprawe($wartosci_sprawa,$wartosci_dane_wnioskodawcy,$wartosci_adres_zamieszkania,$wartosci_dane_pierwszego_przodka,$wartosci_dane_drugiego_przodka), 
								true, "Funkcja \"dodaj_sprawe\" test");

		$wartosci_sprawa = array('cel' => "Przedłużenie");
		$wartosci_dane_wnioskodawcy = array('nazwisko' => "Kavalitz",
											'imie' => "Johanna",
											'plec' => "Kobieta",
											'data_urodzenia' => '2000-02-18',
											'obywatelstwo' => "Czechy",
											'narodowosc' => "Czechy",
											'typ_dokumentu_identyfikacyjnego' => "Dowód osobisty",
											'nr_dokumentu_identyfikacyjnego' => "YGO 324");
		$wartosci_adres_zamieszkania = array('ulica' => NULL,
											'nr_domu' => "4c" ,
											'nr_lokalu' => NULL,
											'kod_pocztowy' => "43-342",
											'miejscowosc' => "Wrocław",
											'panstwo' => "Polska");
		$wartosci_dane_pierwszego_przodka = array('nazwisko' => "Kowalska",
											'imie' => "Anna",
											'data_urodzenia' => "1975-05-12",
											'pokrewienstwo' => "Matka",
											'obywatelstwo' => "Polska",
											'typ_dokumentu_identyfikacyjnego' => "Prawo jazdy",
											'nr_dokumentu_identyfikacyjnego' => "BSJ 4321");
		$wartosci_dane_drugiego_przodka = array('nazwisko' => "Kowalska",
											'imie' => "Marlena",
											'data_urodzenia' => NULL,
											'pokrewienstwo' => "Babcia",
											'obywatelstwo' => "Polska",
											'typ_dokumentu_identyfikacyjnego' => "Prawo jazdy",
											'nr_dokumentu_identyfikacyjnego' => "EJK 4839");

		echo $this->unit->run($this->sprawa_m->dodaj_sprawe($wartosci_sprawa,$wartosci_dane_wnioskodawcy,$wartosci_adres_zamieszkania,$wartosci_dane_pierwszego_przodka,$wartosci_dane_drugiego_przodka), 
								false, "Funkcja \"dodaj_sprawe\" test");

		echo "<br><h3>Sprawdź czy sprawa rozstrzygnięta</h3>";
		$this->unit->use_strict(TRUE);
		echo $this->unit->run($this->sprawa_m->sprawdz_czy_rozstrzygnieta(array('id_lokalne' => "7")), "0", "Funkcja \"sprawdz_czy_rozstrzygnieta\" test");
		echo $this->unit->run($this->sprawa_m->sprawdz_czy_rozstrzygnieta(array('id_lokalne' => "9")), false, "Funkcja \"sprawdz_czy_rozstrzygnieta\" test");
		echo $this->unit->run($this->sprawa_m->sprawdz_czy_rozstrzygnieta(array('id_lokalne' => "12")), "1", "Funkcja \"sprawdz_czy_rozstrzygnieta\" test");
		
		echo "<br><h3>Sprawdz czy pracownik ma kierownictwo</h3>";
		echo $this->unit->run($this->pracownik_m->sprawdz_czy_kierownictwo(1), false, "Funkcja \"sprawdz_czy_kierownictwo\" test");
		echo $this->unit->run($this->pracownik_m->sprawdz_czy_kierownictwo(2), true, "Funkcja \"sprawdz_czy_kierownictwo\" test");

		echo "<br><h3>Rozstrzygnij sprawę</h3>";
		echo $this->unit->run($this->decyzja_m->rozstrzygnij_sprawe(12), false, "Funkcja \"sprawdz_czy_kierownictwo\" test");
		echo $this->unit->run($this->decyzja_m->rozstrzygnij_sprawe(16), true, "Funkcja \"sprawdz_czy_kierownictwo\" test");
		echo $this->unit->run($this->decyzja_m->rozstrzygnij_sprawe(1), false, "Funkcja \"sprawdz_czy_kierownictwo\" test");
		
	}
}
