<?php
/**
 * Template Name: Login
 * Template Post Type: page
 */
?>


<?php get_header(); ?>

<section>
        <div class="lg:flex justify-center">
            <div class="lg:w-1/2 xl:max-w-screen-sm">
                <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
                      <ul class="nav flex justify-around">
                        <li class="signin-active text-center text-lg text-indigo-900 font-display font-semibold lg:text-left xl:text-3xl
                    xl:text-bold"><a class="btn">Sign in</a></li>
                        <li class="signup-inactive text-center text-lg text-indigo-900 font-display font-semibold lg:text-left xl:text-3xl
                    xl:text-bold"><a class="btn">Sign up </a></li>
                      </ul>
                    <div class="mt-12">
                        <form class="form-signin" action="" method="post" name="form">
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="dorian@gmail.com">
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                    <div>
                                        <a class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="Enter your password">
                            </div>
                            <div class="mt-10">
                                <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                                    Log In
                                </button>
                            </div>
                            <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                                Don't have an account ? <a class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
                            </div>
                        </form>
                        <form class="form-signup" action="" method="post" name="form">
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="dorian@gmail.com">
                            </div>
                            <div class="mt-8">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Password</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="Enter your password">
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Confirm Password
                                    </div>
                                    <div>
                                        <a class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="Enter your password">
                            </div>
                            <div class="mt-10">
                                <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php get_footer(); ?>