<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="text-primary m-0 d-flex">
                    <img src="{{ asset('img/logo.svg') }}" alt="Logo" class=" d-inline-block h-100 w-50">
                </h1>
                <h1>
                    <span class="text-primary  h-100 align-bottom align-self-end">Ressine</span>
                </h1>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Errachidia </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>ressine@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Ouverture</h4>
                <h5 class="text-light fw-normal">Lundi - Samedi</h5>
                <p>09h - 21h</p>
                <h5 class="text-light fw-normal">Dimanche</h5>
                <p>10h - 20h</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">liens utils </h4>

                <p class="mb-2"><a href="/admin">Admin </a>|<a href="/chef"> Chef </a>|<a href="/livreur"> Livreur
                    </a></p>
                <form class="position-relative mx-auto" action="{" method="POST"
                      style="max-width: 400px;">
                    @csrf
                    <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" name="message"
                           placeholder="Votre Message" required>
                    <button type="submit" class="btn btn-primary py-2 mt-2 me-2">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-12 text-center text-md-center mb-3 mb-md-0">
                    © 2024 Ressine - Tous droits réservés
                </div>
            </div>
        </div>
    </div>
</div>
