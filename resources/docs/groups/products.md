# Products

Managing Products

## Get Products


List all the products

> Example requests:

```bash
curl -X GET \
    -G "http://laravel-api.test/api/products?page=25" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://laravel-api.test/api/products"
);

let params = {
    "page": "25",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

{
      "data": [
           {
                "id": 1,
                "category_id": "3",
                "name": "Product 1",
                "price": "810.22",
                "category": {
                     "id": 3,
                     "name" "Category 3",
                     "created_at": "2021-02-25T20:17:16.000000Z"
           },
           {
                "id": 2,
                "category_id": "4",
                "name": "Product 2",
                "price": "429.81",
                "category": {
                     "id": 4,
                     "name" "Category 4",
                     "created_at": "2021-02-25T20:17:16.000000Z"
           },
                *            {
                "id": 3,
                "category_id": "1",
                "name": "Product 3",
                "price": "429.81",
                "category": {
                     "id": 1,
                     "name" "Category 1",
                     "created_at": "2021-02-25T20:17:16.000000Z"
           },
               *            {
                "id": 4,
                "category_id": "3",
                "name": "Product 4",
                "price": "215.81",
                "category": {
                     "id": 3,
                     "name" "Category 3",
                     "created_at": "2021-02-25T20:17:16.000000Z"
           },
       ]
}
```
> Example response (404):

```json
{
    "message": "Not found"
}
```
<div id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"></code></pre>
</div>
<div id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products"></code></pre>
</div>
<form id="form-GETapi-products" data-method="GET" data-path="api/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products" onclick="tryItOut('GETapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products" onclick="cancelTryOut('GETapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-products" data-component="query"  hidden>
<br>
Which page to show.</p>
</form>



