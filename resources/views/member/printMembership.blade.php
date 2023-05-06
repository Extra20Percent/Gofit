<h2>Struk Aktivasi</h2>
<p>Nama : {{ $member->username }}</p>
<p>Email : {{ $member->email }}</p>
<p>Nomor HP : {{ $member->phone }}</p>
<p>Alamat : {{ $member->address }}</p>
@if ($membership->price == 50000)
    <p>Paket: Bulanan</p>
@else
    <p>Paket: Tahunan</p>
@endif
<p>Masa Aktif Hingga: {{ $membership->expired_on }}</p>
<p>Total Harga: {{ $membership->price }}</p>
<h3>GOFIT GYM</h3>
<h3>SOLUSI ANDA BEROLAHRAGA</h3>
