@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<section class="contact-section">

    <div class="container">

        {{-- ========================= --}}
        {{-- HEADER --}}
        {{-- ========================= --}}

        <div class="contact-header">

            <span class="contact-label">
                GET IN TOUCH
            </span>

            <h2 class="contact-title">
                Hubungi Kami
            </h2>

            <p class="contact-subtitle">
                Ada pertanyaan seputar produk atau ingin mampir
                ke toko kami? Silakan hubungi lewat form di bawah
                atau kunjungi lokasi kami langsung.
            </p>

        </div>


        {{-- ========================= --}}
        {{-- MAP + FORM --}}
        {{-- ========================= --}}

        <div class="contact-container">

            {{-- MAP --}}
            <div class="contact-map">

                <iframe
                    src="https://www.google.com/maps?q=-6.263131999999985,106.55666252116367&z=17&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>


            {{-- FORM --}}
            <div class="contact-form-wrapper">


                <h3 class="contact-form-title">
                    Kirim Pesan
                </h3>

                <form id="contactForm" class="contact-form">

                    <div class="contact-field">
                        <label class="contact-label-field">Nama</label>
                        <input type="text" id="contactName" class="contact-input"
                               value="{{ Auth::user()->name }}" placeholder="Nama lengkap kamu" required>
                    </div>

                    <div class="contact-field">
                        <label class="contact-label-field">Email</label>
                        <input type="email" id="contactEmail" class="contact-input"
                               value="{{ Auth::user()->email }}" placeholder="email@kamu.com" required>
                    </div>

                    <div class="contact-field">
                        <label class="contact-label-field">Kirim Pesan Melalui</label>

                        <div class="contact-method-options">

                            <label class="contact-method-option">
                                <input type="radio" name="contact_method" value="email" checked>
                                <span>
                                    <i class="bi bi-envelope"></i>
                                    Email
                                </span>
                            </label>

                            <label class="contact-method-option">
                                <input type="radio" name="contact_method" value="whatsapp">
                                <span>
                                    <i class="bi bi-whatsapp"></i>
                                    WhatsApp
                                </span>
                            </label>

                        </div>

                    </div>

                    <div class="contact-field">
                        <label class="contact-label-field">Subjek</label>
                        <input type="text" id="contactSubject" class="contact-input" placeholder="Tentang apa pesan ini?" required>
                    </div>

                    <div class="contact-field">
                        <label class="contact-label-field">Pesan</label>
                        <textarea id="contactMessage" class="contact-input contact-textarea" rows="4" placeholder="Tulis pesan kamu di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark contact-submit">
                        Kirim Pesan
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                </form>


                <script>
                    document.getElementById('contactForm').addEventListener('submit', function (e) {

                        e.preventDefault();

                        const name    = document.getElementById('contactName').value.trim();
                        const email   = document.getElementById('contactEmail').value.trim();
                        const subject = document.getElementById('contactSubject').value.trim();
                        const message = document.getElementById('contactMessage').value.trim();

                        const method = document.querySelector('input[name="contact_method"]:checked').value;

                        // Nomor WhatsApp tujuan (ganti dengan nomor toko kamu)
                        const waNumber = '6283861679625';

                        if (method === 'email') {

                            const emailSubject = encodeURIComponent(subject);

                            const emailBody = encodeURIComponent(
                                'Nama: ' + name + '\n' +
                                'Email: ' + email + '\n\n' +
                                message
                            );

                            window.location.href =
                                'mailto:hermawanangga636@gmail.com?subject=' + emailSubject +
                                '&body=' + emailBody;

                        } else {

                            const waText = encodeURIComponent(
                                'Halo Bunda Footwear, saya ' + name + ' (' + email + ').\n\n' +
                                'Subjek: ' + subject + '\n\n' +
                                message
                            );

                            window.open(
                                'https://wa.me/' + waNumber + '?text=' + waText,
                                '_blank'
                            );

                        }

                    });
                </script>

            </div>

        </div>

    </div>

</section>

@endsection