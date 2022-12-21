browser = navigator.appName
    
const deviceType = () => {
    const ua = navigator.userAgent;

    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua))
    {
        return "tablet";
    }
    else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua))
    {
        return "mobile";
    }
    return "desktop";
};
    
const type = deviceType();

if(type == "tablet" || type == "mobile")
{
    var swiper = new Swiper(".mySwiper",
    {
        slidesPerView: 1,
        spaceBetween: 3,
        loop: true,
        pagination:
        {
            el: ".swiper-pagination",
            clickable: false,
        }
    });
}

if(type == "desktop")
{
    var swiper = new Swiper(".mySwiper",
    {
        slidesPerView: 6,
        spaceBetween: 10,
        loop: true,
        pagination:
        {
            el: ".swiper-pagination",
            clickable: false,
        }
    });
}