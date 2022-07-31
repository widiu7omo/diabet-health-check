import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';
import 'package:url_launcher/url_launcher.dart';

_launchWhatsapp(String number, BuildContext context) async {
  if (number[0] == '0') {
    number = "+62" + number.substring(1);
  }
  var whatsappAndroid = Uri.parse(
      "whatsapp://send?phone=$number&text=Salam,Saya+mau+berkonsultasi");
  try {
    await launchUrl(whatsappAndroid);
  } catch (e) {
    ScaffoldMessenger.of(context).showSnackBar(
      const SnackBar(
        content: Text("WhatsApp tidak terinstall di perangkat"),
      ),
    );
  }
}

class WaItem extends StatelessWidget {
  String phone;
  String name;
  WaItem({required this.name, required this.phone});
  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        if (phone != "Unknown") {
          _launchWhatsapp(phone, context);
        } else {
          ScaffoldMessenger.of(context).showSnackBar(SnackBar(
            content: Text("Dokter tidak mempunyai nomor whatsapp"),
          ));
        }
      },
      child: Container(
        margin: EdgeInsets.only(bottom: 24),
        padding: EdgeInsets.symmetric(horizontal: 12),
        height: 43,
        decoration: BoxDecoration(
            color: bgColor,
            border: Border.all(color: Colors.black),
            borderRadius: BorderRadius.circular(6)),
        child: Row(
          children: [
            Container(
              height: 26,
              width: 26,
              decoration: BoxDecoration(
                  image:
                      DecorationImage(image: AssetImage("assets/waitem.png"))),
            ),
            SizedBox(
              width: 12,
            ),
            Text(
              name,
              style: poppinstext.copyWith(fontSize: 16, fontWeight: semiBold),
            )
          ],
        ),
      ),
    );
  }
}
