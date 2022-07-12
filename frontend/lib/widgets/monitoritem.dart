import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class MonitorItem extends StatelessWidget {
  String title;
  String img;

  MonitorItem({required this.title, required this.img});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.only(bottom: 16),
      padding: EdgeInsets.symmetric(vertical: 9, horizontal: 12),
      height: 66,
      decoration: BoxDecoration(
          color: boxColor,
          border: Border.all(color: Colors.black),
          borderRadius: BorderRadius.circular(5)),
      child: Row(
        children: [
          Container(
            height: 48,
            width: 76,
            decoration: BoxDecoration(
                color: primaryColor,
                borderRadius: BorderRadius.circular(5),
                boxShadow: [
                  BoxShadow(
                      color: Colors.black.withOpacity(0.4),
                      blurRadius: 5,
                      offset: Offset(0, 3))
                ]),
            child: Container(
              decoration:
                  BoxDecoration(image: DecorationImage(image: AssetImage(img))),
            ),
          ),
          SizedBox(
            width: 20,
          ),
          Column(
            children: [
              Text(
                title,
                style: poppinstext.copyWith(
                    decoration: TextDecoration.underline,
                    fontWeight: bold,
                    fontSize: 14),
              ),
              Container()
            ],
          )
        ],
      ),
    );
  }
}
