@extends('layouts.layouts')

@section('content')

<section id="contact" style="margin-top: 100px" class="py-5">
    <div class="container">
        <!-- Header Section -->
        <div class="header-contact text-center mb-5">
            <h2 class="fw-bold">Kontak Kami</h2>
            <p>Silakan mengisi formulir di bawah ini untuk menghubungi kami.</p>
        </div>

        <!-- Contact Form Section -->
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>

            <!-- Contact Information Section -->
            <div class="col-lg-6">
                <div class="contact-info">
                    <h4>Kontak Lainnya</h4>
                    <p><strong>Alamat:</strong> Jalan Raya SMCC No. 1, Kota SMCC</p>
                    <p><strong>Telepon:</strong> +62 123 456 789</p>
                    <p><strong>Email:</strong> contact@smcc.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
