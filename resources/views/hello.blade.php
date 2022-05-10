<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- stylecss --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        {{-- font awesome cdn latest --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" /> --}}
        <title>
            title
        </title>
    </head>
<body>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-t-0 border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
          <h2 class="accordion-header mb-0" id="flush-headingOne">
            <button class="accordion-button
          relative
          flex
          items-center
          w-full
          py-4
          px-5
          text-base text-gray-800 text-left
          bg-white
          border-0
          rounded-none
          transition
          focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
              aria-expanded="false" aria-controls="flush-collapseOne">
              Accordion Item #1
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse border-0 collapse show"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-4 px-5">Placeholder content for this accordion, which is intended to
              demonstrate
              the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
          </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
          <h2 class="accordion-header mb-0" id="flush-headingTwo">
            <button class="accordion-button
          collapsed
          relative
          flex
          items-center
          w-full
          py-4
          px-5
          text-base text-gray-800 text-left
          bg-white
          border-0
          rounded-none
          transition
          focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
              aria-expanded="false" aria-controls="flush-collapseTwo">
              Accordion Item #2
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-4 px-5">Placeholder content for this accordion, which is intended to
              demonstrate
              the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this
              being
              filled with some actual content.</div>
          </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 border-b-0 rounded-none bg-white border border-gray-200">
          <h2 class="accordion-header mb-0" id="flush-headingThree">
            <button class="accordion-button
          collapsed
          relative
          flex
          items-center
          w-full
          py-4
          px-5
          text-base text-gray-800 text-left
          bg-white
          border-0
          rounded-none
          transition
          focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
              aria-expanded="false" aria-controls="flush-collapseThree">
              Accordion Item #3
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-4 px-5">Placeholder content for this accordion, which is intended to
              demonstrate
              the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
              happening here in terms of content, but just filling up the space to make it look, at least at first
              glance,
              a bit more representative of how this would look in a real-world application.</div>
          </div>
        </div>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>