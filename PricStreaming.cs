var httpWebRequest = (HttpWebRequest) WebRequest.Create("https://api.arthikatrading.com/stream/getPrice");
httpWebRequest.ContentType = "application/json";
httpWebRequest.Method = "POST";

using (var streamWriter = new StreamWriter(httpWebRequest.GetRequestStream()))
{
   string json = "{\"getPrice\":" +
                 "   {\"user\":\"login_name\"," +
                 "    \"password\":\"2c70e12b7a0646f92279f427c7b38e7334d8e5389cff167a1dc30e73f826b683\"," +
                 "    \"customer\":1," +
                 "    \"security\":[\"EUR_USD\",\"GBP_USD\"]," +
                 "    \"interface\":[\"TI1\",\"TI2\"]," +
                 "    \"granularity\":\"FBA\"," +
                 "    \"levels\":2}}";
   streamWriter.Write( json );
}

var httpResponse = (HttpWebResponse) httpWebRequest.GetResponse();
var result;
using (var streamReader = new StreamReader(httpResponse.GetResponseStream()))
{
   try
   {
      while (true)
      {
         result = Console.WriteLine(streamReader.ReadLine());
         // Process 'result' on each tick
      }
   }
   catch (SocketException ex) { }
   catch (IOException ioex) { }
}
