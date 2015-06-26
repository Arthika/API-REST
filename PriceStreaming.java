private static final String JSON_URL = "https://api.arthikatrading.com/stream/getPrice";

public void getPrice() {
    String url = URL.encode(JSON_URL);
    JsonObject getPriceObject = Json.createObjectBuilder()
        .add("getPrice", Json.createObjectBuilder()
            .add("user", "login_name")
            .add("password", "2c70e12b7a0646f92279f427c7b38e7334d8e5389cff167a1dc30e73f826b683")
            .add("customer", 1)
            .add("security", Json.createArrayBuilder().add("EUR_USD").add("GBP_USD"))
            .add("interface", Json.createArrayBuilder().add("TI1").add("TI2"))
            .add("granularity", "FBA")
            .add("levels", 2))
        .build();
    RequestBuilder builder = new RequestBuilder(RequestBuilder.POST, url);
    post.setHeader("Accept","application/json");
    post.setHeader("Content-Type","application/json");
    try {
        Request request = builder.sendRequest(getPriceObject.toString(), new RequestCallback() {
            public void onError(Request request, Throwable exception) {
                Window.alert("Couldn't retrieve JSON");
            }
            public void onResponseReceived(Request request, Response response) {
                if (200 == response.getStatusCode()) {
                    JsonReader jsonReader = Json.createReader(new StringReader(response.getText()));
                    JsonObject jsonObject = jsonReader.readObject();
                    jsonReader.close();
                }
            }
        });
    } 
}
