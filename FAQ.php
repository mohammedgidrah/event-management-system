<?php
include "connection.php";
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiveNet FAQs</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/faqs/faq-3/assets/css/faq-3.css">
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .all {
            font-family: var(--par);
            margin: 0;
            padding: 0;
            background-image: url('img/n_main_bg.svg');
            background-size: cover;
            background-position: center;

        }

        .header {
            background-color: #86C8C2;
            border-radius: 30px;
            font-family: 'Poppins', sans-serif;
            color: #26355D;
            padding: 20px;
        }

        .header>p {
            font-size: 30px;
            color: #26355D;

        }

        .dark_hr {
            color: #26355D;
            background-color: #26355D;
        }
    </style>
</head>

<body>
    <div class="all">


        <!-- FAQ 3 - Bootstrap Brain Component -->
        <section class="bsb-faq-3 py-3 py-md-5 py-xl-8 ">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="mb-4 display-5 text-center header">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>

            <!-- General FAQs -->
            <div class="mb-8">
                <div class="container header">
                    <div class="row justify-content-center">
                        <div class="col-11 col-xl-10">
                            <div class="d-flex align-items-end mb-5">
                                <i class="bi bi-info-circle me-3 lh-1 display-5"></i>
                                <h3 class="m-0">General</h3>
                            </div>
                        </div>
                        <div class="col-11 col-xl-10">
                            <div class="accordion accordion-flush" id="faqGeneral">
                                <div class="accordion-item bg-transparent border-top border-bottom py-3 b">
                                    <h2 class="accordion-header" id="faqGeneralHeading1">
                                        <button
                                            class="accordion-button collapsed bg-transparent fw-bold shadow-none link-danger"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqGeneralCollapse1" aria-expanded="false"
                                            aria-controls="faqGeneralCollapse1">
                                            What is HiveNet?
                                        </button>
                                    </h2>
                                    <div id="faqGeneralCollapse1" class="accordion-collapse collapse"
                                        aria-labelledby="faqGeneralHeading1">
                                        <div class="accordion-body">
                                            <p>HiveNet is a comprehensive event management platform that allows users to
                                                discover, participate in, and manage a variety of events and occasions.
                                                Whether you’re looking for local gatherings, professional conferences,
                                                or social activities, HiveNet brings all these opportunities together in
                                                one place.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent border-bottom py-3">
                                    <h2 class="accordion-header" id="faqGeneralHeading2">
                                        <button
                                            class="accordion-button collapsed bg-transparent fw-bold shadow-none link-danger"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqGeneralCollapse2" aria-expanded="false"
                                            aria-controls="faqGeneralCollapse2">
                                            How do I sign up for HiveNet?
                                        </button>
                                    </h2>
                                    <div id="faqGeneralCollapse2" class="accordion-collapse collapse"
                                        aria-labelledby="faqGeneralHeading2">
                                        <div class="accordion-body">
                                            <p>To sign up, click on the "Sign Up" button on the top right corner of the
                                                homepage, fill out the registration form with your details, and you’ll
                                                be ready to start exploring events.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent border-bottom py-3">
                                    <h2 class="accordion-header" id="faqGeneralHeading3">
                                        <button
                                            class="accordion-button collapsed bg-transparent fw-bold shadow-none link-danger"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqGeneralCollapse3" aria-expanded="false"
                                            aria-controls="faqGeneralCollapse3">
                                            Is HiveNet free to use?
                                        </button>
                                    </h2>
                                    <div id="faqGeneralCollapse3" class="accordion-collapse collapse"
                                        aria-labelledby="faqGeneralHeading3">
                                        <div class="accordion-body">
                                            <p>Yes, HiveNet offers a free version that allows users to browse and
                                                participate in events. Some premium features or events may require a
                                                subscription or one-time payment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQs: For Participants -->
            <div class="mb-8">
                <div class="container header">
                    <div class="row justify-content-center">
                        <div class="col-11 col-xl-10">
                            <div class="d-flex align-items-end mb-5">
                                <i class="bi bi-people me-3 lh-1 display-5"></i>
                                <h3 class="m-0">For Participants</h3>
                            </div>
                        </div>
                        <div class="col-11 col-xl-10">
                            <div class="accordion accordion-flush" id="faqParticipants">
                                <div class="accordion-item bg-transparent border-top border-bottom py-3">
                                    <h2 class="accordion-header" id="faqParticipantsHeading1">
                                        <button
                                            class="accordion-button collapsed bg-transparent fw-bold shadow-none link-danger"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqParticipantsCollapse1" aria-expanded="false"
                                            aria-controls="faqParticipantsCollapse1">
                                            How can I find events on HiveNet?
                                        </button>
                                    </h2>
                                    <div id="faqParticipantsCollapse1" class="accordion-collapse collapse"
                                        aria-labelledby="faqParticipantsHeading1">
                                        <div class="accordion-body">
                                            <p>You can use the search bar on the homepage to find events by name,
                                                location, or category. Additionally, you can use filters to narrow down
                                                your search results based on specific criteria such as date, type of
                                                event, or popularity.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent border-bottom py-3">
                                    <h2 class="accordion-header" id="faqParticipantsHeading2">
                                        <button
                                            class="accordion-button collapsed bg-transparent fw-bold shadow-none link-danger"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqParticipantsCollapse2" aria-expanded="false"
                                            aria-controls="faqParticipantsCollapse2">
                                            How do I register for an event?
                                        </button>
                                    </h2>
                                    <div id="faqParticipantsCollapse2" class="accordion-collapse collapse"
                                        aria-labelledby="faqParticipantsHeading2">
                                        <div class="accordion-body">
                                            <p>Once you find an event you’re interested in, click on the event listing
                                                to view details. From there, you can click the "Register" button and
                                                follow the prompts to complete your registration.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent border-bottom py-3">
                                    <h2 class="accordion-header" id="faqParticipantsHeading3">
                                        <button
                                            class="accordion-button collapsed bg-transparent fw-bold shadow-none link-danger"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqParticipantsCollapse3" aria-expanded="false"
                                            aria-controls="faqParticipantsCollapse3">
                                            Can I save events for later?
                                        </button>
                                    </h2>
                                    <div id="faqParticipantsCollapse3" class="accordion-collapse collapse"
                                        aria-labelledby="faqParticipantsHeading3">
                                        <div class="accordion-body">
                                            <p>Yes, you can add events to your wish list by clicking the "Save" button
                                                on the event listing. You can access your saved events from your profile
                                                page.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more FAQs for Participants as needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional FAQ sections can be added similarly -->

        </section>
    </div>
</body>

</html>
<?php include 'footer.php'; ?>