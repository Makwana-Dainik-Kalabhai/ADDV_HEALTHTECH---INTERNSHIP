export const Amenities = () => {
    let amenities = [
        {
            price: 3500000,
            img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBu8h0Sd10sNUZnzeWQWcW7Ovxoxlfh8ouvGznt1VJNg&s=10",
            amentity: "Gourmet Kitchen"
        },
        {
            price: 4500000,
            img: "https://media.architecturaldigest.com/photos/620ab660bf50a6417b170f16/master/w_1024%2Cc_limit/1104%2520Seminole%2520Blvd-11%2520(1).jpg",
            amentity: "Swimming Pool"
        },
        {
            price: 5500000,
            img: "https://squarefeetgroup.in/2/images/Blogs/real-estate-projects-in-thane-june-2024.jpg",
            amentity: "Meeting Area"
        },
        {
            price: 6500000,
            img: "https://rightchannelconstructions.com/wp-content/uploads/2023/12/Role-of-amenities-blog.webp",
            amentity: "Living Balcony"
        },
    ];
    return (
        <section className="public-home-amenities px-4 sm:px-12">
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>
            <div className="bg-circles"></div>

            <div className="section-heading">
                <h1 className="text-2xl fg-secondary">Amenities</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>

            {amenities.map((ele, ind) => {
                return (
                    <div className={`amenity-card row align-items-center ${(ind % 2 == 0) ? "flex-row-reverse" : ""}`} key={ele.img}>
                        <div className="col-6">
                            <img src={ele.img} alt={ele.amentity} className="w-100" />
                        </div>
                        <div className="col-6">
                            <h1 className="text-3xl font-bold mb-1">{ele.amentity}</h1>
                            <span className="text-gray-800 inline-block">Rs.{ele.price}</span>
                            <p className="mt-5 fg-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus obcaecati, eaque ullam molestias expedita rerum hic officiis quisquam vero iure velit sunt quod et voluptate porro praesentium recusandae commodi cumque.</p>
                        </div>
                    </div>
                )
            })}
        </section>
    );
}