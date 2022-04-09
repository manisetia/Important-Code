ShopifyAnalytics.meta.page
-------------------------------------------------
window.ShopifyAnalytics.meta.page.customerId;



var getCustomerId = function() {
    try {
      let curr = window.ShopifyAnalytics.meta.page.customerId;
      if (curr !== undefined && curr !== null && curr !== "") {
        return curr;
      }
    } catch(e) { }
    try {
      let curr = window.meta.page.customerId;
      if (curr !== undefined && curr !== null && curr !== "") {
        return curr;
      }
    } catch (e) { }    
    try {
      let curr = _st.cid;
      if (curr !== undefined && curr !== null && curr !== "") {
        return curr;
      }
    } catch (e) { }
    try {
      let curr = ShopifyAnalytics.lib.user().traits().uniqToken;
      if (curr !== undefined && curr !== null && curr !== "") {
        return curr;
      }
    } catch (e) { }
    return null;
  }
