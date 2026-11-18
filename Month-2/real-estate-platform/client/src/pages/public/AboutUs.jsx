import { useEffect } from "react";
import "../../assets/styles/public-aboutus.css";

export const AboutUs = () => {
    useEffect(() => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }, []);

    return (
        <section className="px-4 sm:px-12 public-aboutus-page">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>


            <div className="section-heading">
                <h1 className="text-xl fg-secondary">Find Your Place. Build Your Future.</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>


            <div className="aboutus-container p-10 rounded-5 bg-white">
                <p>Welcome to EstatePro, your trusted destination for discovering properties, connecting with real estate professionals, and making smarter property decisions.</p>
                <p>We believe that finding the right property is more than just buying or renting a space — it's about finding a place where your dreams, lifestyle, and future come together.</p>
                <p>Our platform simplifies the real estate experience by bringing property listings, experienced agents, and potential buyers together in one convenient place. Whether you're searching for your dream home, exploring investment opportunities, or looking to list your property, we're here to make every step easier.</p>

                <h4 className="mt-12">Our Mission</h4>
                <p className="fg-secondary ps-7">Our mission is to make real estate simple, transparent, and accessible for everyone. We aim to connect buyers, sellers, property owners, and agents through a modern platform that saves time, builds trust, and creates meaningful opportunities.</p>

                <h4 className="mt-12">Our Vision</h4>
                <p className="fg-secondary ps-7">To become a trusted real estate destination where technology meets property expertise, helping people discover better opportunities and make confident real estate decisions.</p>

                <h4 className="mt-12 mb-5">What We Offer?</h4>
                <div className="row m-0">
                    <div className="col-2 p-2">
                        <div className="card p-5">
                            <h6>Property Discovery</h6>
                            <p className="fs-sm">Explore a wide range of residential and commercial properties that match your needs and preferences.</p>
                        </div>
                    </div>
                    <div className="col-2 p-2">
                        <div className="card p-5">
                            <h6>Verified Property Details</h6>
                            <p className="fs-sm">Access essential information, images, amenities, pricing, and property specifications.</p>
                        </div>
                    </div>
                    <div className="col-2 p-2">
                        <div className="card p-5">
                            <h6>Professional Agents</h6>
                            <p className="fs-sm">Connect with experienced real estate agents who understand your requirements.</p>
                        </div>
                    </div>
                    <div className="col-2 p-2">
                        <div className="card p-5">
                            <h6>Easy Property Management</h6>
                            <p className="fs-sm">Manage property listings, details, images, and availability from one centralized platform.</p>
                        </div>
                    </div>
                    <div className="col-2 p-2">
                        <div className="card p-5">
                            <h6>Seamless Bookings</h6>
                            <p className="fs-sm">Schedule property visits and manage booking requests with ease.</p>
                        </div>
                    </div>
                    <div className="col-2 p-2">
                        <div className="card p-5">
                            <h6>Smart Experience</h6>
                            <p className="fs-sm">Enjoy a user-friendly platform designed to make your property journey smooth and convenient.</p>
                        </div>
                    </div>
                </div>



                <h4 className="mt-12">Why Choose Us?</h4>
                <p className="fg-secondary ps-7">We combine modern technology with a customer-focused approach to deliver a better real estate experience. From discovering properties to connecting with agents and managing bookings, we bring everything together in one place.</p>
                <p className="fg-secondary ps-7">We focus on transparency, convenience, reliability, and building lasting relationships with our customers.</p>


                <h4 className="mt-12 fg-success">Let's Find Your Next Property</h4>
                <p className="fg-secondary ps-7">Your next chapter starts with the right place. Let us help you discover it.</p>
                <h5 className="fg-danger">Explore properties, connect with professionals, and turn your real estate goals into reality.</h5>
            </div>
        </section>
    );
}