<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Birds of the World</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
            }
            h1, h2, h3, .font-serif {
                font-family: 'Playfair Display', serif;
            }
        </style>
    </head>
    <body class="bg-stone-50 text-stone-800 antialiased flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-stone-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-serif font-bold text-emerald-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 7h.01"/><path d="M3.4 18H12a8 8 0 0 0 8-8V7a4 4 0 0 0-7.28-2.3L2 20"/><path d="m20 7 2 .5-2 .5"/><path d="M10 18v3"/><path d="M14 17.75V21"/><path d="M7 18a6 6 0 0 0 3.84-10.61"/></svg>
                    Aviary
                </a>
                <nav class="hidden md:flex gap-6">
                    <a href="#" class="text-stone-600 hover:text-emerald-700 transition font-medium">Home</a>
                    <a href="#" class="text-stone-600 hover:text-emerald-700 transition font-medium">Gallery</a>
                    <a href="#" class="text-stone-600 hover:text-emerald-700 transition font-medium">About</a>
                </nav>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-stone-900 hover:text-emerald-700">Dashboard <span aria-hidden="true">&rarr;</span></a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-stone-900 hover:text-emerald-700">Log in <span aria-hidden="true">&rarr;</span></a>
                        @endauth
                    @else
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-stone-900 hover:text-emerald-700">Dashboard <span aria-hidden="true">&rarr;</span></a>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-grow">
            <section class="relative bg-emerald-900 text-white overflow-hidden">
                <div class="absolute inset-0 opacity-40">
                    <img src="https://images.unsplash.com/photo-1444464666168-49b626f8a15b?q=80&w=2070&auto=format&fit=crop" alt="Flock of birds" class="w-full h-full object-cover" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/80 to-transparent"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 tracking-tight">Discover the Majesty of Birds</h1>
                    <p class="text-lg md:text-xl text-emerald-100 max-w-2xl mx-auto mb-10 font-light">
                        Explore the vibrant colors, fascinating behaviors, and diverse habitats of our feathered friends from around the globe.
                    </p>
                    <a href="#gallery" class="inline-block bg-emerald-500 hover:bg-emerald-400 text-white font-medium py-3 px-8 rounded-full transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        View Gallery
                    </a>
                </div>
            </section>

            <!-- Gallery Section -->
            <section id="gallery" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-stone-800 mb-4">Featured Avian Species</h2>
                    <div class="w-24 h-1 bg-emerald-500 mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Bird Card 1 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group cursor-pointer border border-stone-100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1555169062-013468b47731?q=80&w=1887&auto=format&fit=crop" alt="Macaw Parrot" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out" />
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full text-emerald-700">Tropical</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-stone-800 mb-2">Scarlet Macaw</h3>
                            <p class="text-stone-600 mb-4 line-clamp-2 text-sm">
                                Known for their striking red, yellow, and blue plumage, these intelligent parrots are native to the humid evergreen forests of tropical Americas.
                            </p>
                            <a href="#" class="text-emerald-600 font-medium hover:text-emerald-800 inline-flex items-center gap-1 transition">
                                Learn more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Bird Card 2 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group cursor-pointer border border-stone-100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1605092676920-8ac5ae40c7c8?q=80&w=1965&auto=format&fit=crop" alt="Kingfisher" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out" />
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full text-cyan-700">River</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-stone-800 mb-2">Common Kingfisher</h3>
                            <p class="text-stone-600 mb-4 line-clamp-2 text-sm">
                                A small, unmistakable bright blue and orange bird of slow-moving or still water. They fly low over water and hunt fish from riverside perches.
                            </p>
                            <a href="#" class="text-emerald-600 font-medium hover:text-emerald-800 inline-flex items-center gap-1 transition">
                                Learn more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Bird Card 3 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group cursor-pointer border border-stone-100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1542159079-56d10c144e1a?q=80&w=2070&auto=format&fit=crop" alt="Bald Eagle" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out" />
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full text-amber-700">Raptor</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-stone-800 mb-2">Bald Eagle</h3>
                            <p class="text-stone-600 mb-4 line-clamp-2 text-sm">
                                The bald eagle is a bird of prey found in North America. A sea eagle, it has two known subspecies and forms a species pair with the white-tailed eagle.
                            </p>
                            <a href="#" class="text-emerald-600 font-medium hover:text-emerald-800 inline-flex items-center gap-1 transition">
                                Learn more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Bird Card 4 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group cursor-pointer border border-stone-100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1535591273668-578e31182c4f?q=80&w=2070&auto=format&fit=crop" alt="Hummingbird" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out" />
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full text-rose-600">Nectarivore</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-stone-800 mb-2">Hummingbird</h3>
                            <p class="text-stone-600 mb-4 line-clamp-2 text-sm">
                                Hummingbirds are birds native to the Americas and constitute the biological family Trochilidae. They are the smallest of birds.
                            </p>
                            <a href="#" class="text-emerald-600 font-medium hover:text-emerald-800 inline-flex items-center gap-1 transition">
                                Learn more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Bird Card 5 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group cursor-pointer border border-stone-100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1550853024-fae8cd4be47f?q=80&w=2083&auto=format&fit=crop" alt="Owl" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out" />
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full text-stone-700">Nocturnal</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-stone-800 mb-2">Barn Owl</h3>
                            <p class="text-stone-600 mb-4 line-clamp-2 text-sm">
                                The barn owl is the most widely distributed species of owl in the world and one of the most widespread of all species of birds.
                            </p>
                            <a href="#" class="text-emerald-600 font-medium hover:text-emerald-800 inline-flex items-center gap-1 transition">
                                Learn more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Bird Card 6 -->
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group cursor-pointer border border-stone-100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1590400030528-98f5a6b093de?q=80&w=2070&auto=format&fit=crop" alt="Flamingo" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 ease-in-out" />
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full text-pink-600">Wading</div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-stone-800 mb-2">Greater Flamingo</h3>
                            <p class="text-stone-600 mb-4 line-clamp-2 text-sm">
                                The most widespread and largest species of the flamingo family. It is found in Africa, on the Indian subcontinent, in the Middle East, and in southern Europe.
                            </p>
                            <a href="#" class="text-emerald-600 font-medium hover:text-emerald-800 inline-flex items-center gap-1 transition">
                                Learn more <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-stone-900 text-stone-400 py-12 border-t border-stone-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <a href="/" class="text-2xl font-serif font-bold text-white flex items-center gap-2 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 7h.01"/><path d="M3.4 18H12a8 8 0 0 0 8-8V7a4 4 0 0 0-7.28-2.3L2 20"/><path d="m20 7 2 .5-2 .5"/><path d="M10 18v3"/><path d="M14 17.75V21"/><path d="M7 18a6 6 0 0 0 3.84-10.61"/></svg>
                        Aviary
                    </a>
                    <p class="text-sm">Celebrating the beauty and diversity of birds across the world. Join us in our mission to learn and protect.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-emerald-400 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Gallery</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Conservation</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Newsletter</h4>
                    <p class="text-sm mb-4">Subscribe to get the latest avian updates.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="bg-stone-800 border-none rounded-l-md px-4 py-2 w-full focus:ring-1 focus:ring-emerald-500 outline-none text-white text-sm" />
                        <button class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2 rounded-r-md transition text-sm font-medium">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-stone-800 text-sm text-center">
                <p>&copy; {{ date('Y') }} Aviary. All rights reserved.</p>
            </div>
        </footer>

    </body>
</html>
