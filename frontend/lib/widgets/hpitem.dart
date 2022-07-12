import 'package:diabetesapps/shared/theme.dart';
import 'package:flutter/material.dart';

class HpItem extends StatelessWidget {
  String title;
  String desc;
  Function() onPress;

  HpItem({required this.title, required this.desc, required this.onPress});

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: onPress,
      child: Container(
        margin: EdgeInsets.only(bottom: 16),
        height: 75,
        decoration: BoxDecoration(
            color: boxColor,
            borderRadius: BorderRadius.circular(5),
            border: Border.all(color: Colors.black)),
        padding: EdgeInsets.symmetric(vertical: 15, horizontal: 14),
        child: Stack(
          children: [
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  title,
                  style:
                      poppinstext.copyWith(fontSize: 12, fontWeight: semiBold),
                ),
                Text(
                  desc,
                  style: poppinstext.copyWith(
                    fontSize: 12,
                    fontWeight: medium,
                  ),
                )
              ],
            ),
            Align(
              alignment: Alignment.bottomRight,
              child: Container(
                child: Text(
                  "Lihat Detail",
                  style:
                      poppinstext.copyWith(fontSize: 12, fontWeight: semiBold),
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}
