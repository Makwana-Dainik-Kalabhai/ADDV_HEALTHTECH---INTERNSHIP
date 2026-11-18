import { useState } from "react";
import { PropertyModal } from "./PropertyModal";

export const PropertyCard = ({ property }) => {
    let [showModal, setShowModal] = useState(false);
    let [modalData, setModalData] = useState({});

    return (
        <>
            <div className="col-6 lg:col-3">
                <div className="card h-100 shadow-lg overflow-hidden">
                    <img src={property.images[0].url} alt={property.name} />

                    <div className="details px-5 py-3 pb-12 position-relative h-100">
                        <h6 className="name">{property.name}</h6>
                        <p className="fs-xs">{property.description}</p>

                        <div className="specifications py-2">
                            {Object.keys(property.specifications).map((ele) => {
                                return !!property.specifications[ele] > 0 && <span className="px-4 py-1 me-2 d-inline-block mb-2 bg-secondary rounded-8 fs-xs">{property.specifications[ele]} {ele}</span>
                            })}
                        </div>

                        <div className="price-and-view position-absolute start-0 bottom-0 row px-5 py-3 w-100 align-items-center">
                            <div className="col-7">
                                <div className="price">
                                    <span className="d-block fs-xs">Price</span>
                                    <span className="d-block fs-sm">Rs.{property.price.amount}</span>
                                </div>
                            </div>

                            <div className="col-5 d-flex justify-content-center">
                                <button className="fs-xs btn-solid theme-accent" onClick={() => { setShowModal(true); setModalData(property) }}>View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {showModal && <div className="property-modal-container">
                <PropertyModal setShowModal={setShowModal} property={modalData} />
            </div>}
        </>
    );
}