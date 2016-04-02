//
//  About2.m
//  SCCF
//
//  Created by Kenneth Coury on 3/8/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "About2.h"

@interface About2 ()

@end

@implementation About2

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

- (IBAction)realEstate:(id)sender {
    
        [[UIApplication sharedApplication]
         openURL:[NSURL URLWithString:@"http://eds.linux.1903host.com/?page_id=610"]];
}

- (IBAction)enVi:(id)sender {
    [[UIApplication sharedApplication]
     openURL:[NSURL URLWithString:@"http://eds.linux.1903host.com/?page_id=615"]];
}

- (IBAction)tranT:(id)sender {
    [[UIApplication sharedApplication]
     openURL:[NSURL URLWithString:@"http://eds.linux.1903host.com/?page_id=621"]];
}

- (IBAction)mark:(id)sender {
    [[UIApplication sharedApplication]
     openURL:[NSURL URLWithString:@"http://eds.linux.1903host.com/?page_id=625"]];
}

- (IBAction)busi:(id)sender {
    [[UIApplication sharedApplication]
     openURL:[NSURL URLWithString:@"http://eds.linux.1903host.com/?page_id=630"]];
}
@end
