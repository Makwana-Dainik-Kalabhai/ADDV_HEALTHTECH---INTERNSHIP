import { useEffect } from "react";
import "../../assets/styles/public-contact.css";

export const Contact = () => {
    useEffect(() => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }, []);

    return (
        <section className="public-contact-page">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>


            <div className="hero-section position-relative d-flex align-items-center">
                <img className="w-100 h-100 position-absolute top-0 start-0" src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=875&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D" alt="" />
                <div className="row m-0 px-12 position-relative w-100 align-items-center">
                    <div className="col-5 text-center border-end py-12"><h1>Contact US</h1></div>
                    <div className="col-7 ps-10 py-12">
                        <h3>Crafting Spaces that Inspire</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, quibusdam quisquam et saepe deleniti sunt sapiente? Tempora officiis sed suscipit? Unde, magnam reprehenderit inventore quaerat saepe officiis qui cum voluptatem?</p>
                    </div>
                </div>
            </div>



            <div className="contact-container position-relative px-4 sm:px-12 bg-white pt-12">
                <div className="row m-0 py-12">
                    <div className="col-6 px-12">
                        <h5 className="fg-danger">Get In Touch</h5>
                        <h1>How We Can Help You?</h1>
                        <p className="fg-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, eius illum animi eveniet molestias corporis voluptatum perferendis, deleniti quibusdam inventore dolorum. Mollitia odit eligendi unde commodi illum recusandae debitis eos.</p>


                        <div className="row mt-12">
                            <div className="col-2 fs-2xl text-center fg-danger">
                                <i className="fa-solid fa-building-flag"></i>
                            </div>
                            <div className="col-10">
                                <h5>HeadQuarters</h5>
                                <p>Thaltej, Ahmedabad, Gujarat, India</p>
                            </div>
                        </div>

                        <div className="row">
                            <div className="col-2 fs-2xl text-center fg-danger">
                                <i className="fa-solid fa-phone"></i>
                            </div>
                            <div className="col-10">
                                <h5>Inquiries</h5>
                                <p>+91 98989 67676</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-6 bg-secondary p-10 rounded-7">
                        <form action="">
                            <div className="row">
                                <div className="col-6">
                                    <label for="exampleFormControlInput" class="form-label mb-2">First Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="firstname"></input>
                                </div>
                                <div className="col-6">
                                    <label for="exampleFormControlInput" class="form-label mb-2">Last Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="lastname"></input>
                                </div>
                            </div>

                            <div className="row mt-6">
                                <div className="col-6">
                                    <label for="exampleFormControlInput" class="form-label mb-2">Email ID</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput" placeholder="email"></input>
                                </div>
                                <div className="col-6">
                                    <label for="exampleFormControlInput" class="form-label mb-2">Phone</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput" placeholder="phone" minLength={10} maxLength={10}></input>
                                </div>
                            </div>

                            <div className="row mt-6">
                                <div class="form-field">
                                    <label for="exampleFormControlTextarea2" class="form-label">Message</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" placeholder="Enter Your Message Here..."></textarea>
                                </div>
                            </div>

                            <button className="btn-solid theme-danger mt-10">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    );
}