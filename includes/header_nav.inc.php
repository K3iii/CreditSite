<header class=" sticky bg-slate-800 top-0 z-10 border-b-4">
    <section class="grid grid-cols-2  items-center justify-between md:justify-start p-4">


        <button id="hamburger-button" class="relative h-8 w-8 cursor-pointer text-3xl md:hidden">
            <!-- &#9776; -->
            <div
                class="absolute top-4 -mt-0.5 h-1 w-8 rounded bg-white transition-all duration-500 before:absolute before:h-1 before:w-8 before:-translate-x-4 before:-translate-y-3 before:rounded before:bg-white before:transition-all before:duration-500 before:content-[''] after:absolute after:h-1 after:w-8 after:-translate-x-4 after:translate-y-3 after:rounded after:bg-white after:transition-all after:duration-500 after:content-['']">
            </div>
        </button>

        <nav class="hidden sm:inline space-x-2 text-fountain-blue-500" aria-label="main">
            <a href="" target="_blank" rel="noopener noreferrer">
                <img src="assets/img/credit-logo-1.png" alt="" srcset="" class="inline h-12">
            </a>
            <a href="index.php" class="hover:opacity-90 family-serif ">Homepage</a>
            <span class="hover:opacity-90 cursor-pointer" type="button" data-modal-toggle="payment-modal" id="login">Pay
                Me</span>
            <a href="mailto:jmprofile.link" class="hover:opacity-90">Contact Me</a>

        </nav>
        <nav class="text-fountain-blue-500 flex justify-end items-center">
            <?php if (isset($_SESSION['username'])) : ?>
            <span class="mx-5 font-bolds"><?php echo $_SESSION['username']; ?></span>
            <?php endif; ?>
            <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                class=" bg-white p-2 rounded-full w-10 h-10 hover:bg-white/50" type="button" aria-expanded="true"
                aria-haspopup="true">
                <i class="fa-solid fa-user"></i></i>
            </button>
            <div id="dropdown" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                class="hidden absolute right-1 z-10 mt-40 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <ul class="py-1 text-gray-700" aria-labelledby="dropdownDefault">
                    <?php if ($userid != 11) : ?>
                    <li class="block py-2 px-4">Balance : <i class="fa-solid fa-peso-sign"></i> <span
                            class="font-bold"><?php echo $utang - $totals; ?></span>
                    </li>
                    <?php else : ?>
                    <li class="block py-2 px-4 hover:text-red-500"><a href="admin/admin.php">Admin Page</a></li>
                    <?php endif; ?>
                    <li class="block py-2 px-4 hover:text-red-500"><a href="includes/logout.inc.php">Logout</a></li>

                </ul>
            </div>

        </nav>

    </section>
    <section>
        <nav>

        </nav>
    </section>
    <section class="flex justify-end">

    </section>
    <section id="mobile-menu"
        class="top-68 justify-content-center absolute hidden w-full origin-top animate-open-menu flex-col bg-black text-5xl">
        <!-- <button class="text-8xl self-end px-6">
                        &times;
                    </button> -->
        <nav class="flex min-h-screen flex-col items-center py-8" aria-label="mobile">
            <a href="index.php" class="w-full py-6 text-white text-center hover:opacity-90">Home</a>
            <a href="#payment-modal" id="login" class="w-full py-6 text-white text-center hover:opacity-90">Pay
                Me</a>
            <a href="mailto:jmprofile.link" class="w-full text-white py-6 text-center hover:opacity-90">Contact
                Me</a>
            <a href="includes/logout.inc.php" class="w-full py-6 text-white text-center hover:opacity-90">Logout</a>

        </nav>
    </section>
</header>