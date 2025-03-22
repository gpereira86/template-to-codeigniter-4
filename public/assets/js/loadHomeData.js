import {swipe} from './swipeBanner.js';

async function loadHomeData(){
    var bannerHome = document.querySelector('._bannerHome');
    var recent = document.querySelector('._recent');
    var categoryCulture = document.querySelector('._category_culture');
    var categoryBusiness = document.querySelector('._category_business');
    var categoryLifestyle = document.querySelector('._category_lifestyle');

    // USANDO O PROMISSE ALL:
    // const responses = await Promise.all([
    //     await fetch('/banner/home', {method:'get'}),
    //     await fetch('/trendings', {method:'get'}),
    //     await fetch('/recent', {method:'get'}),
    //     await fetch('/category/culture', {method:'get'}),
    //     await fetch('/category/business', {method:'get'}),
    //     await fetch('/category/lifestyle', {method:'get'}),
    // ]);
    //
    // const bannerHtml = await responses[0].text();
    // const trendingHtml = await responses[1].text();
    // const recentHtml = await responses[2].text();
    // const categoryCultureHtml = await responses[3].text();
    // const categoryBusinessHtml = await responses[4].text();
    // const categoryLifestyleHtml = await responses[5].text();
    //
    // bannerHome.innerHTML = bannerHtml;
    // recent.innerHTML = recentHtml;
    //
    // var trending = document.querySelector('._trending');
    // trending.innerHTML = trendingHtml;
    //
    // categoryCulture.innerHTML = categoryCultureHtml;
    //
    // categoryBusiness.innerHTML = categoryBusinessHtml;
    //
    // categoryLifestyle.innerHTML = categoryLifestyleHtml;


    // SEM USAR O PROMISSE ALL:
    //!! load banner home
    const dataBanner = await fetch('/banner/home', {method:'get'});
    const bannerHtml = await dataBanner.text();
    bannerHome.innerHTML = bannerHtml;

    swipe(".sliderFeaturedPosts");

    //!! load recent
    const dataRecent = await fetch('/recent', {method:'get'});
    const recentHtml = await dataRecent.text();
    recent.innerHTML = recentHtml;

    //!! load banner trendings
    var trending = document.querySelector('._trending');
    const dataTrending = await fetch('/trendings', {method:'get'});
    const trendingHtml = await dataTrending.text();
    trending.innerHTML = trendingHtml;

    //!! load Category Culture
    const dataCategoryCulture = await fetch('/category/culture', {method:'get'});
    const categoryCultureHtml = await dataCategoryCulture.text();
    categoryCulture.innerHTML = categoryCultureHtml;

    //!! load Category Business
    const dataCategoryBusiness = await fetch('/category/business', {method:'get'});
    const categoryBusinessHtml = await dataCategoryBusiness.text();
    categoryBusiness.innerHTML = categoryBusinessHtml;

    //!! load Category Lifestyle
    const dataCategoryLifestyle = await fetch('/category/lifestyle', {method:'get'});
    const categoryLifestyleHtml = await dataCategoryLifestyle.text();
    categoryLifestyle.innerHTML = categoryLifestyleHtml;

}

loadHomeData();