<?php
abstract class Bentuk {
    protected $nama;

    public function __construct($nama) {
        $this->nama = $nama;
    }

    abstract public function hitungLuas();
    abstract public function hitungKeliling();

    public function tampilkanHasil() {
        echo "\n--- HASIL PERHITUNGAN " . strtoupper($this->nama) . " ---\n";
        echo "Luas (L)     : " . round($this->hitungLuas(), 2) . "\n";
        echo "Keliling (K) : " . round($this->hitungKeliling(), 2) . "\n";
        echo "----------------------------------------\n\n";
    }
}

class Persegi extends Bentuk {
    private $s;
    public function __construct($sisi) {
        parent::__construct("Persegi");
        $this->s = $sisi;
    }
    public function hitungLuas() { return $this->s * $this->s; }
    public function hitungKeliling() { return 4 * $this->s; }
}

class PersegiPanjang extends Bentuk {
    private $p, $l;
    public function __construct($panjang, $lebar) {
        parent::__construct("Persegi Panjang");
        $this->p = $panjang;
        $this->l = $lebar;
    }
    public function hitungLuas() { return $this->p * $this->l; }
    public function hitungKeliling() { return 2 * ($this->p + $this->l); }
}

class Segitiga extends Bentuk {
    private $a, $t, $s1, $s2, $s3;
    public function __construct($alas, $tinggi, $s1, $s2, $s3) {
        parent::__construct("Segitiga");
        $this->a = $alas; $this->t = $tinggi;
        $this->s1 = $s1; $this->s2 = $s2; $this->s3 = $s3;
    }
    public function hitungLuas() { return 0.5 * $this->a * $this->t; }
    public function hitungKeliling() { return $this->s1 + $this->s2 + $this->s3; }
}

class Lingkaran extends Bentuk {
    private $r;
    public function __construct($jariJari) {
        parent::__construct("Lingkaran");
        $this->r = $jariJari;
    }
    public function hitungLuas() { return M_PI * $this->r * $this->r; }
    public function hitungKeliling() { return 2 * M_PI * $this->r; }
}

while (true) {
    echo "=== KALKULATOR GEOMETRI OOP ===\n";
    echo "1. Persegi\n2. Persegi Panjang\n3. Segitiga\n4. Lingkaran\n5. Keluar\n";
    echo "Pilih menu (1-5): ";
    $pilihan = trim(fgets(STDIN));

    if ($pilihan == "1") {
        echo "Masukkan sisi (s): "; $s = floatval(trim(fgets(STDIN)));
        $objek = new Persegi($s);
    } elseif ($pilihan == "2") {
        echo "Masukkan panjang (p): "; $p = floatval(trim(fgets(STDIN)));
        echo "Masukkan lebar (l): "; $l = floatval(trim(fgets(STDIN)));
        $objek = new PersegiPanjang($p, $l);
    } elseif ($pilihan == "3") {
        echo "Masukkan alas (a): "; $a = floatval(trim(fgets(STDIN)));
        echo "Masukkan tinggi (t): "; $t = floatval(trim(fgets(STDIN)));
        echo "Masukkan sisi 1: "; $s1 = floatval(trim(fgets(STDIN)));
        echo "Masukkan sisi 2: "; $s2 = floatval(trim(fgets(STDIN)));
        echo "Masukkan sisi 3: "; $s3 = floatval(trim(fgets(STDIN)));
        $objek = new Segitiga($a, $t, $s1, $s2, $s3);
    } elseif ($pilihan == "4") {
        echo "Masukkan jari-jari (r): "; $r = floatval(trim(fgets(STDIN)));
        $objek = new Lingkaran($r);
    } elseif ($pilihan == "5") {
        echo "Keluar program. Terima kasih!\n"; break;
    } else {
        echo "\nPilihan salah! Coba lagi.\n\n"; continue;
    }

    $objek->tampilkanHasil();
}
