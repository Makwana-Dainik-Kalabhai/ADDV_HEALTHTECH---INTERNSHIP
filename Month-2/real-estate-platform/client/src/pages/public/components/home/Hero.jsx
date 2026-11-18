import { NavLink } from "react-router-dom";

export const Hero = () => {
    return (
        <section className="px-4 sm:px-12">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>

            <div className="public-home-hero">
                <img src="/src/assets/images/public-hero-img.png" alt="Hero Image" />

                <div className="right-content p-5 sm:p-10">
                    <h1 className="lg:fg-white fw-bold mb-3">Find Your<br />Perfect Property</h1>
                    <p className="fs-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, quis nulla? Nisi quasi illum optio iste. Repellendus nesciunt, recusandae vero velit facilis molestiae alias quae possimus architecto quam. Eos, officia!</p>

                    <NavLink to="/signup" className="bg-inverse px-5 py-2 rounded-9 text-decoration-none fg-white">Signup Now</NavLink>
                </div>
            </div>



            <div className="public-home-quality-cards row g-5 mt-5">
                <div className="col-3">
                    <div className="card h-100 d-block text-center">
                        <i className="fa-solid fa-house text-xl mb-5"></i>
                        <h5>Find Your Dream House</h5>
                    </div>
                </div>
                <div className="col-3">
                    <div className="card h-100 d-block text-center">
                        <i className="fa-solid fa-percent text-xl mb-5"></i>
                        <h5>Unlock Your Property Value</h5>
                    </div>
                </div>
                <div className="col-3">
                    <div className="card h-100 d-block text-center">
                        <i className="fa-solid fa-user-tie text-xl mb-5"></i>
                        <h5>Effortless Property Management</h5>
                    </div>
                </div>
                <div className="col-3">
                    <div className="card h-100 d-block text-center">
                        <i className="fa-solid fa-money-bill-trend-up text-xl mb-5"></i>
                        <h5>Smart Investments. Informed Decisions</h5>
                    </div>
                </div>
            </div>
        </section>
    );
}