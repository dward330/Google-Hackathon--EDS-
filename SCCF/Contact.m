//
//  Contact.m
//  SCCF
//
//  Created by Kenneth Coury on 2/21/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "Contact.h"

@interface Contact ()

@end

@implementation Contact

-(IBAction)link {
    [[UIApplication sharedApplication]
     openURL:[NSURL URLWithString:@"http://www.economicdevelopmentsouth.org/"]];
    
}

-(IBAction)link2 {
    [[UIApplication sharedApplication]
        openURL:[NSURL URLWithString:@"https://www.facebook.com/pages/Economic-Development-South/293553297426716"]];
}

-(IBAction)link3 {
            [[UIApplication sharedApplication]
             openURL:[NSURL URLWithString:@"https://twitter.com/EconDevSouth"]];
    
}

-(IBAction)link4 {
    [[UIApplication sharedApplication]
     openURL:[NSURL URLWithString:@"https://www.google.com/maps/place/4127+Brownsville+Rd,+Pittsburgh,+PA+15227/@40.365805,-79.9819297,17z/data=!3m1!4b1!4m2!3m1!1s0x8834f09ebe197ea7:0xf28a9746637f49f9"]];
    
    
    
}

-(IBAction)MakePhoneCall:(id)sender {
    [[UIApplication sharedApplication] openURL:[NSURL URLWithString:@"tel:4128841400"]];
}

-(IBAction)email {
    MFMailComposeViewController *composer = [[MFMailComposeViewController alloc] init];
    [composer setMailComposeDelegate:self];
    if ([MFMailComposeViewController canSendMail]) {
        [composer setToRecipients:[NSArray arrayWithObjects:@"info@economicdevelopmentsouth.org", nil]];
        [composer setSubject:@"subject here"];
        [composer setMessageBody:@"message here" isHTML:NO];
        [composer setModalTransitionStyle:UIModalTransitionStyleCrossDissolve];
        [self presentModalViewController:composer animated:YES];
    

    }
}
- (void)viewDidLoad {
    [super viewDidLoad];
    // Do any additional setup after loading the view.
}

- (void)didReceiveMemoryWarning {
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

/*
#pragma mark - Navigation

// In a storyboard-based application, you will often want to do a little preparation before navigation
- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender {
    // Get the new view controller using [segue destinationViewController].
    // Pass the selected object to the new view controller.
}
*/

@end
