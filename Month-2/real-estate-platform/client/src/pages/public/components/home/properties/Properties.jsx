import { properties } from "./real_estate_properties_20.js";
import { PropertyCard } from "./PropertyCard.jsx";

export const Properties = () => {
    return (
        <section className="public-home-properties px-4 sm:px-12">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>

            <div className="section-heading">
                <h1 className="text-2xl fg-secondary">Featured Properties</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>

            <div className="properties-grid row g-6">
                {properties.map((ele) => (
                    <PropertyCard property={ele} key={ele.id} />
                )
                )}
            </div>
        </section>
    );
}