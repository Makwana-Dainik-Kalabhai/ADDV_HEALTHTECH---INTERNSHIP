import { useEffect, useState } from "react";
import "../../assets/styles/public-properties.css";
import { properties } from "./components/home/properties/real_estate_properties_20";
import { PropertyCard } from "./components/properties/PropertyCard";


export const Properties = () => {
    useEffect(() => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }, []);

    return (
        <section className="public-properties-page">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>

            <header className="bg-inverse px-4 sm:px-12 py-5">
                <div className="row justify-content-center">
                    <div className="col-2">
                        <input type="date" name="filter-date" className="form-control rounded-9" />
                    </div>
                    <div className="col-2 position-relative">
                        <select name="filter-location" className="form-control">
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Surat">Surat</option>
                        </select>
                    </div>
                </div>
            </header>



            <div className="row m-0">
                <div className="col-3 filters bg-white px-10">
                    <div className="row py-7 border-bottom border-2">
                        <div className="col-6"><h5>Filter By</h5></div>
                        <div className="col-6 text-end"><button className="border-0 fg-danger" style={{ backgroundColor: "transparent" }}>Clear All</button></div>
                    </div>

                    <h5 className="mt-5">Price Range</h5>
                    <div className="ps-4 fg-secondary">
                        <input type="checkbox" name="price-range" /> {`>`} Rs. 1 Cr<br />
                        <input type="checkbox" name="price-range" /> Rs. 50 Lac - 1 Cr<br />
                        <input type="checkbox" name="price-range" /> Rs. 30 Lac - 50 Lac<br />
                        <input type="checkbox" name="price-range" /> Custom

                        <div className="row custom-price mt-5 fg-inverse">
                            <div className="col-6"><h6>Min</h6><input type="number" name="min-price" className="form-control" value={0} /></div>
                            <div className="col-6"><h6>Max</h6><input type="number" name="max-price" className="form-control" value={0} /></div>
                        </div>
                    </div>
                    <hr />

                    <h5 className="mt-5">Facilities</h5>
                    <div className="ps-4 fg-secondary">
                        <input type="checkbox" name="facility" value="Swimming Pool" /> Swimming Pool <br />
                        <input type="checkbox" name="facility" value="Gymnasium" /> Gymnasium <br />
                        <input type="checkbox" name="facility" value="Club House" /> Club House <br />
                        <input type="checkbox" name="facility" value="Children's Play Area" /> Children's Play Area <br />
                        <input type="checkbox" name="facility" value="24x7 Security" /> 24x7 Security <br />
                        <input type="checkbox" name="facility" value="Power Backup" /> Power Backup <br />
                        <input type="checkbox" name="facility" value="Landscaped Garden" /> Landscaped Garden <br />
                    </div>
                </div>

                <div className="col-9 ps-10 py-10 properties-grid">
                    <div className="row g-5">
                        {properties.map((ele) => (
                            <PropertyCard property={ele} />
                        ))}
                    </div>
                </div>
            </div>
        </section>
    );
}